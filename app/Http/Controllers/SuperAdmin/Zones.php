<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use Illuminate\Http\Request;

class Zones extends Controller
{
    public function zone_view()
    {
        $zones = Zone::all();

        return view('super_admin.production.zone',[
            'zones' => $zones
        ]);
    }

    public function zone_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Zone::create([
            'zone_name' => $request->name,
        ]);

        return back()->with('success', 'Zone added successfully!');
    }
}
