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
    
    //Register frontend.php route custom way..
    ->withRouting(
        web: __DIR__.'/../routes/frontend.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    // ->withRouting(
    //     web: __DIR__.'/../routes/backend.php',
    //     commands: __DIR__.'/../routes/console.php',
    //     health: '/up',
    // )

    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
