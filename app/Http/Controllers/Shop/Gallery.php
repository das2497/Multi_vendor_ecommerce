<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product_sub_category;
use App\Models\Products;
use Illuminate\Http\Request;

class Gallery extends Controller
{
    public function view()
    {
        $products = Products::paginate(40);
        
        return view('shop.gallery', [
            'products' => $products
        ]);
    }
    public function view_by_category($name)
    {
        $products = Products::where('category', $name)->paginate(40);

        $sub_categories = Product_sub_category::where('main_category', $name)->get();
        
        return view('shop.gallery', [
            'products' => $products,
            'sub_categories' => $sub_categories
        ]);
    }
    public function view_by_shop($name)
    {
        $products = Products::where('shop', $name)->paginate(40);
        
        return view('shop.gallery', [
            'products' => $products
        ]);
    }
}
