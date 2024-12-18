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
            'CustomerMiddleware' => App\Http\Middleware\CustomerMiddleware::class,
            'RestaurantMiddleware' => App\Http\Middleware\RestaurantMiddleware::class,
            'AuthMiddleware' => App\Http\Middleware\AuthMiddleware::class,
        ]);
        $middleware->web([
            App\Http\Middleware\SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
