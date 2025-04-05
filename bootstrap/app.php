<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'login' => \App\Http\Middleware\Login::class,
            's_admin' => \App\Http\Middleware\SuperAdmin::class,
            'rider' => \App\Http\Middleware\Rider::class,
            'shop' => \App\Http\Middleware\Shop::class,
            'customer' => \App\Http\Middleware\Customer::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
