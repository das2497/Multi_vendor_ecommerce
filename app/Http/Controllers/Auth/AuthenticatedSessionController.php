<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->role === 's_admin') {
            return redirect('/super-admin/dashboard');
        } elseif (Auth::user()->role === 'o_admin') {
            return redirect('/order-admin/dashboard');
        } elseif (Auth::user()->role === 'rider') {
            return redirect('/rider/dashboard');
        } elseif (Auth::user()->role === 'shop') {
            return redirect('/shop-owner/dashboard');
        } elseif (Auth::user()->role === 'customer') {
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
