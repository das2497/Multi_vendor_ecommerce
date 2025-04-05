<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Riders;
use Illuminate\Http\Request;

class New_orders extends Controller
{
    public function view()
    {

        $orders = Order::join('customers', 'orders.customer_id', '=', 'customers.unique_id')
            ->join('address_books', 'orders.address_id', '=', 'address_books.id')
            ->select('orders.*', 'customers.*', 'address_books.*', 'orders.created_at as order_created', 'orders.created_at as order_date', 'customers.name as customer_name')
            ->where('orders.status', 'Packaging')
            ->orderBy('orders.created_at', 'desc')
            ->get();

        $riders = Riders::all();

        return view('super_admin.production.packaging-orders', [
            'orders' => $orders,
            'riders' => $riders
        ]);
    }

    public function packaging_orders_view(Request $request)
    {

        $rider = Order::where('order_id', $request->id)
        ->whereNull('rider_id')
        ->first();

        $order=null;

        if ($rider) {
            $order = Order::join('customers', 'orders.customer_id', '=', 'customers.unique_id')
            ->join('address_books', 'orders.address_id', '=', 'address_books.id')
            ->select('orders.*', 'customers.*', 'address_books.*', 'orders.created_at as order_created', 'customers.name as customer_name')
            ->where('orders.order_id', $request->id)
            ->first();
        } else {
            $order = Order::join('customers', 'orders.customer_id', '=', 'customers.unique_id')
            ->join('address_books', 'orders.address_id', '=', 'address_books.id')
            ->join('riders', 'orders.rider_id', '=', 'riders.id')
            ->select('orders.*', 'customers.*', 'address_books.*', 'orders.created_at as order_created', 'customers.name as customer_name','riders.name as rider_name')
            ->where('orders.order_id', $request->id)
            ->first();
        }

        $order_items = Cart::join('products', 'carts.product_id', '=', 'products.unique_id')
            ->join('shops', 'products.shop', '=', 'shops.name')
            ->select('carts.*', 'products.*', 'shops.*', 'products.name as product_name', 'products.unique_id as product_id','carts.qty as cart_qty','products.price as product_price')
            ->where('carts.order_id', $request->id)
            ->get();

        return view('super_admin.production.packaging-orders-view', [
            'order' => $order,
            'order_items' => $order_items
        ]);
    }

    public function assign_rider(Request $request)
    {

        if ($request->rider_id == '') {
            return back()->with('error', 'Please select a rider');
        }

        if ($request->rider_id == 'null') {
            Order::where('order_id', $request->order_id)->update([
                'rider_id' => null
            ]);

            return back()->with('success', 'Rider removed successfully');
        }

        Order::where('order_id', $request->order_id)->update([
            'rider_id' => $request->rider_id
        ]);

        return back()->with('success', 'Rider assigned successfully');
    }
}
