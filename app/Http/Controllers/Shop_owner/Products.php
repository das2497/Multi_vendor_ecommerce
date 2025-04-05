<?php

namespace App\Http\Controllers\Shop_owner;

use App\Http\Controllers\Controller;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use App\Models\Products as Model_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Products extends Controller
{
    public function products_view()
    {
        $categories = Product_category::all();
        $sub_categories = Product_sub_category::all();

        $products = Model_product::all();

        return view('shop_owner.products_add', [
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'products' => $products,
        ]);
    }

    public function products_store(Request $request)
    {
        $request->validate([
            'file1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);


        $imageName1 = time() . '.' . $request->file1->extension();
        $request->file1->move(public_path('assets/images/products'), $imageName1);

        $imageName2 = '';
        if ($request->file2) {
            $imageName2 = time() . '.' . $request->file2->extension();
            $request->file2->move(public_path('assets/images/products'), $imageName2);
        }

        $imageName3 = '';
        if ($request->file3) {
            $imageName3 = time() . '.' . $request->file3->extension();
            $request->file3->move(public_path('assets/images/products'), $imageName3);
        }

        Model_product::create([
            'unique_id' => 'prd_' . uniqid(),
            'shop' => Auth::user()->name,
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'price' => number_format($request->price),
            'qty' => $request->qty,
            'sold' => 0,
            'brand' => $request->brand,
            'img1' => $imageName1,
            'img2' => $imageName2,
            'img3' => $imageName3,
        ]);

        return back()->with('success', 'Product added successfully!');
    }
}
