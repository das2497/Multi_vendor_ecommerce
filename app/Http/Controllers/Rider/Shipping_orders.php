<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Riders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Shipping_orders extends Controller
{
    
    public function view()
    {
        $rider_id = Riders::where('email', Auth::user()->email)->first()->id;

        $orders = Order::join('customers', 'orders.customer_id', '=', 'customers.unique_id')
            ->join('address_books', 'orders.address_id', '=', 'address_books.id')
            ->select('orders.*', 'customers.*', 'address_books.*', 'orders.created_at as order_created', 'orders.created_at as order_date', 'customers.name as customer_name')
            ->where('orders.status', 'Shipping')
            ->where('orders.rider_id', $rider_id)
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('rider.shipping-orders', [
            'orders' => $orders
        ]);
    }

    public function shipping_orders_view(Request $request)
    {

        $order = Order::join('customers', 'orders.customer_id', '=', 'customers.unique_id')
            ->join('address_books', 'orders.address_id', '=', 'address_books.id')
            ->join('riders', 'orders.rider_id', '=', 'riders.id')
            ->select('orders.*', 'customers.*', 'address_books.*', 'orders.created_at as order_created', 'customers.name as customer_name', 'riders.name as rider_name')
            ->where('orders.order_id', $request->id)
            ->first();

        $order_items = Cart::join('products', 'carts.product_id', '=', 'products.unique_id')
            ->join('shops', 'products.shop', '=', 'shops.name')
            ->select('carts.*', 'products.*', 'shops.*', 'products.name as product_name', 'products.unique_id as product_id', 'carts.qty as cart_qty', 'products.price as product_price')
            ->where('carts.order_id', $request->id)
            ->get();

        return view('rider.shipping-orders-view', [
            'order' => $order,
            'order_items' => $order_items
        ]);
    }

    public function change_state(Request $request)
    {

        if ($request->state == '') {
            return redirect()->back()->with('error', 'Please select a state');
        }

        $order_id = $request->order_id;
        $status = $request->state;

        Order::where('order_id', $order_id)->update([
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Order status updated successfully');
    }
}
