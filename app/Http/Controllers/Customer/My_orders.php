<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class My_orders extends Controller
{
    public function view()
    {

        $orders = Order::join('customers', 'orders.customer_id', '=', 'customers.unique_id')            
            ->join('users', 'customers.email', '=', 'users.email')
            ->select('orders.*', 'customers.*','orders.created_at as order_date')
            ->where('users.email', Auth::user()->email)
            ->where('orders.status', 'Packaging')
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('shop.my-orders', [
            'orders' => $orders
        ]);
    }
}
