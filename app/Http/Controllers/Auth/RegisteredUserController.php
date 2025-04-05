<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role == 'shop') {
            Shop::create([
                'unique_id' => 'sp_' . uniqid(),
                'name' => $request->name,
                'email' => $request->email,
                'category' => $request->category,
                'address' => $request->address,
                'contact' => $request->contact,
                'zone' => $request->zone,
            ]);
        } elseif ($request->role == 'customer') {
            Customer::create([
                'unique_id' => 'cus_' . uniqid(),
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->contact,
                'state' => 'active',
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect('/login');
    }
}
