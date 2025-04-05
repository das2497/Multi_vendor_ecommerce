<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\CheckoutMail;
use App\Models\Address_book;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Checkout extends Controller
{
    public function checkout_view()
    {

        $customer = Customer::where('email', Auth::user()->email)->first();

        $cart_items = Cart::where('customer_id', $customer->unique_id)
            ->whereNull('order_id')
            ->join('products', 'carts.product_id', '=', 'products.unique_id')
            ->select('products.*', 'carts.*')
            ->get();

        $zone_list = Zone::all();

        $address_list = Address_book::where('customer_id', $customer->unique_id)->get();

        return view('shop.checkout', [
            'cart_items' => $cart_items,
            'address_list' => $address_list,
            'zone_list' => $zone_list
        ]);
    }

    public function add_address(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'zone' => 'required|string',
            'contact_1' => 'required|regex:/^(\+?[0-9\s\-]*)$/|min:10|max:15',
            'contact_2' => 'nullable|regex:/^(\+?[0-9\s\-]*)$/|min:10|max:15',
        ]);

        $customer = Customer::where('email', Auth::user()->email)->first();

        $address = new Address_book();
        $address->customer_id = $customer->unique_id;
        $address->receiver_name = $request->name;
        $address->address_1 = $request->address;
        $address->zone = $request->zone;
        $address->contact_1 = $request->contact_1;
        $address->contact_2 = $request->contact_2;
        $address->state = 'active';
        $address->save();

        return back()->with('success', 'Address added successfully');
    }

    public function get_shipping_cost(Request $request)
    {

        $address = Address_book::where('id', $request->address_id)->first();

        $get_shipping_cost = Zone::where('zone_name', $address->zone)->first();

        return response()->json([
            'success' => 'Shipping cost fetched successfully',
            'get_shipping_cost' => $get_shipping_cost->fee
        ]);
    }

    public function place_order(Request $request)
    {

        if ($request->address_id == null) {
            return back()->with('error', 'Please select an address');
        }

        if ($request->total == 0) {
            return back()->with('error', 'Please add some products to cart');
        }

        $customer = Customer::where('email', Auth::user()->email)->first();

        $cart_items = Cart::where('customer_id', $customer->unique_id)
            ->whereNull('order_id')
            ->join('products', 'carts.product_id', '=', 'products.unique_id')
            ->select('products.*', 'carts.*')
            ->get();

        $shipping_cost = Zone::join('address_books', 'zones.zone_name', '=', 'address_books.zone')
            ->where('address_books.id', $request->address_id)
            ->select('zones.fee')
            ->first();

        $order_id = 'ORD_' . time();

        $order = new Order();
        $order->order_id = $order_id;
        $order->customer_id = $customer->unique_id;
        $order->special_note = $request->note;
        $order->total_price = $request->total;
        $order->address_id = $request->address_id;
        $order->shipping_cost = $shipping_cost->fee;
        $order->payment_option = $request->payment_option;
        $order->rider_id = null;
        $order->status = 'Packaging';
        $order->save();

        foreach ($cart_items as $cart_item) {
            Cart::where('id', $cart_item->id)
                ->update(['order_id' => $order_id]);
        }

        $details = [
            'order_id' => $order_id,
            'customer_id' => $customer->unique_id,
            'customer_name' => $customer->name,
            'payment_option' => $request->input('payment_option'),
            'total' => $request->total,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'cart_items' => $cart_items,
            'order_details' => [
                [
                    'order_id' => $order_id,
                    'total_price' => $request->total,
                    'address_id' => $request->address_id,
                    'note' => $request->note,
                ],
            ],
        ];

        try {
            Mail::to('danushkasandagiri@gmail.com')->send(new CheckoutMail($details));
            return redirect('/order-success')
                ->with('success', 'Order placed successfully')
                ->with('order_id', $order_id)
                ->with('cart_items', $cart_items)
                ->with('customer_id', $customer->unique_id)
                ->with('payment_option', $request->input('payment_option'))
                ->with('total', $request->total)
                ->with('order_details', [
                    [
                        'order_id' => $order_id,
                        'total_price' => $request->total,
                        'address_id' => $request->address_id,
                        'note' => $request->note,
                    ],
                ]);
        } catch (\Throwable $th) {
            return redirect('/order-success')
                ->with('success', 'Order placed successfully')
                ->with('order_id', $order_id)
                ->with('cart_items', $cart_items)
                ->with('customer_id', $customer->unique_id)
                ->with('payment_option', $request->input('payment_option'))
                ->with('total', $request->total)
                ->with('order_details', [
                    [
                        'order_id' => $order_id,
                        'total_price' => $request->total,
                        'address_id' => $request->address_id,
                        'note' => $request->note,
                    ],
                ]);
        }
    }
}
