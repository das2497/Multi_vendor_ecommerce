<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Riders;
use App\Models\Shop;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function view()
    {
        $customers = Customer::all();
        $shops = Shop::all();
        $riders = Riders::all();
        $orders = Order::all();
        $today_orders = Order::whereDate('created_at', date('Y-m-d'))->get();

        return view('super_admin.production.index',[
            'customers' => $customers,
            'shops' => $shops,
            'riders' => $riders,
            'orders' => $orders,
            'today_orders' => $today_orders,
            'date' => date('Y-m-d')
        ]);
    }
}
