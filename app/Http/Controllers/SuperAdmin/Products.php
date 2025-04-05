<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use Illuminate\Http\Request;

class Products extends Controller
{
    public function product_category_view()
    {
        $categories  = Product_category::all();
        return view('super_admin.production.product_category', [
            'categories' => $categories
        ]);
    }

    public function product_category_store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
        ]);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('assets/images/product_category'), $imageName);

        Product_category::create([
            'name' => $request->name,
            'img' => $imageName,
        ]);

        return back()->with('success', 'Product category added successfully!');
    }

    public function product_sub_category_view()
    {
        $categories  = Product_sub_category::all();
        $main_categories = Product_category::all();
        return view('super_admin.production.product_sub_category', [
            'categories' => $categories,
            'main_categories' => $main_categories
        ]);
    }

    public function product_sub_category_store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'main_category' => 'required',
            'name' => 'required',
        ]);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('assets/images/product_sub_category'), $imageName);

        Product_sub_category::create([
            'name' => $request->name,
            'main_category' => $request->main_category,
            'img' => $imageName,
        ]);

        return back()->with('success', 'Product sub category added successfully!');
    }
}
