<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product_category;
use App\Models\Products;
use App\Models\Shop;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function view(){

        $product_categories_all = Product_category::all();

        $latest_products = Products::latest()->limit(20)->get();

        $carousel_products = Products::limit(8)->get();

        $shops = Shop::all();

        return view('shop.index',[
            'product_categories_all' => $product_categories_all,
            'latest_products' => $latest_products,                                    
            'carousel_products' => $carousel_products,  
            'shops' => $shops                                  
        ]);
    }
}
