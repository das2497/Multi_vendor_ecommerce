<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Shop_category;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Shops extends Controller
{
    public function active_shop_view()
    {
        return view('super_admin.production.shops');
    }

    public function all_shop_view()
    {
        return view('super_admin.production.shops');
    }

    public function shop_category_view()
    {
        $categories = Shop_category::all();

        return view('super_admin.production.shop_category', [
            'categories' => $categories
        ]);
    }

    public function shop_category_store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
        ]);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('assets/images/shop_category'), $imageName);

        Shop_category::create([
            'name' => $request->name,
            'img' => $imageName,
        ]);

        return back()->with('success', 'Shop category added successfully!');
    }

    public function add_shop_view()
    {

        $shops = Shop::get();
        $shop_categories = Shop_category::all();
        $zones = Zone::all();

        return view('super_admin.production.shop_add', [
            'shops' => $shops,
            'shop_categories' => $shop_categories,
            'zones' => $zones,
        ]);
    }

    public function add_shop_store(Request $request)
    {
        // Define validation rules
        $validatedData = $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:shops,email',
            'contact' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'category' => 'required|string',
            'zone' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $email_duplicate = User::where('email', '=', $request->email)->first();
        if ($email_duplicate) {
            return back()->with('error', 'This email already in used!');
        } else {

            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/images/shop'), $imageName);

            Shop::create([
                'unique_id' => 'sp_' . uniqid(),
                'name' => $request->name,
                'email' => $request->email,
                'category' => $request->category,
                'contact' => $request->contact,
                'address' => $request->address,
                'zone' => $request->zone,
                'img' => $imageName,
                'status' => 'pending'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'shop',
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'Shop category added successfully!');
        }
    }
}
