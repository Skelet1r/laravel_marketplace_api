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
        $middleware->validateCsrfTokens(except: [
            'http://127.0.0.1:8000/createAccount',
            'http://127.0.0.1:8000/signIn',
            'http://127.0.0.1:8000/logout',
            'http://127.0.0.1:8000/forgotPassword',
            'http://127.0.0.1:8000/resetPassword*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
