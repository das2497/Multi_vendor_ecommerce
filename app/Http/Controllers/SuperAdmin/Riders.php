<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Riders as ModelsRiders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Riders extends Controller
{
    public function rider_add_view()
    {
        $riders = ModelsRiders::all();

        return view('super_admin.production.rider_add',[
            'riders' => $riders
        ]);
    }

    public function rider_add_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'vehicle' => 'required',
            'contact_1' => 'required',
            'contact_2' => 'required',
            'address' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $email_duplicate = User::where('email', '=', $request->email)->first();
        if ($email_duplicate) {
            return back()->with('error', 'This email already in used!');
        } else {
            ModelsRiders::create([
                'name' => $request->name,
                'email' => $request->email,
                'vehicle' => $request->vehicle,
                'contact_1' => $request->contact_1,
                'contact_2' => $request->contact_2,
                'address' => $request->address,
                'currently_status' => 'offline',
                'state' => 'pending',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'rider',
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'Rider added successfully!');
        }
    }
}
