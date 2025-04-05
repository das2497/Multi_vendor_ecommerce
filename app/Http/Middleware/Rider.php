<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Rider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/');
        } elseif (Auth::user()->role === 's_admin') {
            return redirect('/order-admin/dashboard');
        } elseif (Auth::user()->role === 'o_admin') {
            return redirect('/order-admin/dashboard');
        } elseif (Auth::user()->role === 'rider') {
            return $next($request);
        } elseif (Auth::user()->role === 'shop') {
            return redirect('/shop-owner/dashboard');
        } elseif (Auth::user()->role === 'customer') {
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
}
