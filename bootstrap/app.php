<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {
        // Middleware bawaan Laravel
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

            // Middleware custom kamu
            'admin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        // Tambahkan ini supaya Laravel tahu siapa handler exception-nya
        $exceptions->reportable(function (Throwable $e) {
            //
        });
    })

    ->create();