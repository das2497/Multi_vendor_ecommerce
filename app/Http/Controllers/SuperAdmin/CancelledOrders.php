<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CancelledOrders extends Controller
{
    public function view()
    {
        $orders = Order::join('customers', 'orders.customer_id', '=', 'customers.unique_id')
        ->join('riders', 'orders.rider_id', '=', 'riders.id')
        ->join('address_books', 'orders.address_id', '=', 'address_books.id')
        ->select('orders.*', 'customers.*', 
        'address_books.*', 
        'orders.created_at as order_created', 
        'orders.created_at as order_date', 
        'customers.name as customer_name',
        'riders.name as rider_name')
        ->where('orders.status', 'Cancelled')
        ->orderBy('orders.created_at', 'desc')
        ->get();

        return view('super_admin.production.cancelled-orders',[
            'orders' => $orders
        ]);
    }

    public function order_view(Request $request)
    {
        $order = Order::join('customers', 'orders.customer_id', '=', 'customers.unique_id')
        ->join('address_books', 'orders.address_id', '=', 'address_books.id')
        ->select('orders.*', 'customers.*', 'address_books.*', 'orders.created_at as order_created', 'customers.name as customer_name')
        ->where('orders.order_id', $request->id)
        ->first();

        $order_items = Cart::join('products', 'carts.product_id', '=', 'products.unique_id')
        ->join('shops', 'products.shop', '=', 'shops.name')
        ->select('carts.*', 'products.*', 'shops.*', 'products.name as product_name', 'products.unique_id as product_id','carts.qty as cart_qty','products.price as product_price')
        ->where('carts.order_id', $request->id)
        ->get();

        return view('super_admin.production.cancelled-orders-view',[
            'order_items' => $order_items,
            'order' => $order
        ]);
    }
}
