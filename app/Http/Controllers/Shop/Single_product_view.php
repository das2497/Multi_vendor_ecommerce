<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class Single_product_view extends Controller
{
    public function view(Request $request)
    {

        $id = $request->id;

        $product = Products::find($id);

        return view('shop.single-product-view',[
            'product' => $product
        ]);
    }
}
