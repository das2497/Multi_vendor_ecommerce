<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Favorites extends Controller
{
    public function view()
    {
        $items = Favorite::join('products', 'favorites.product_id', '=', 'products.unique_id')
            ->join('customers', 'favorites.customer_id', '=', 'customers.unique_id')
            ->select('products.*')
            ->where('customers.email', Auth::user()->email)
            ->get();

        return view('shop.favorites', [
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $customer = Customer::where('email', '=', Auth::user()->email)->first();

        Favorite::create([
            'product_id' => $request->product_id,
            'customer_id' => $customer->unique_id
        ]);

        return back()->with('success_favorite', 'Successfully added to the favorites.');
    }
}
