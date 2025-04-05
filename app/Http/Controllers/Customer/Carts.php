<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Carts extends Controller
{

    public function cart_view()
    {
        $customer = Customer::where('email', Auth::user()->email)->first();

        $cart_items = Cart::where('customer_id', $customer->unique_id)
            ->whereNull('order_id')
            ->join('products', 'carts.product_id', '=', 'products.unique_id')
            ->select('products.*', 'carts.*')
            ->get();

        return view('shop.cart', [
            'cart_items' => $cart_items,
        ]);
    }

    public function add_to_cart(Request $request)
    {

        $item = Products::where('unique_id', $request->product_id)->first();

        $sujests = Products::where('category', $item->category)->get();

        $customer = Customer::where('email', Auth::user()->email)->first();

        $cart = Cart::where('product_id', $item->unique_id)
            ->whereNull('order_id')
            ->where('customer_id', $customer->unique_id)
            ->first();

        if (!$cart) {
            Cart::create([
                'product_id' => $item->unique_id,
                'customer_id' => $customer->unique_id,
                'qty' => 1,
                'total' => $item->price * 1,
                'status' => 'pending',
            ]);
        }

        return back()->with([
            'cart_add_success' => 'Successfully added to the cart!',
            'sujests' => $sujests,
        ]);
    }

    public function remove_from_cart(Request $request)
    {
        Cart::where('id', $request->cart_item_id)->delete();

        return back()->with([
            'cart_remove_success' => 'Successfully removed from the cart!',
        ]);
    }

    public function update_cart(Request $request)
    {
        $cart = Cart::where('id', $request->cart_item_id)->first();

        $item = Products::where('unique_id', $cart->product_id)->first();

        // $sujests = Products::where('category', $item->category)->get();

        if ($request->qty < 0 || $request->qty > $item->qty) {
            return back()->with([
                'cart_update_error' => 'Not enough quantity!',
            ]);
        }

        $cart->update([
            'qty' => $request->qty,
            'total' => $item->price * $request->qty,
        ]);

        return back()->with([
            'cart_update_success' => 'Successfully updated the cart!',
        ]);
    }
}
