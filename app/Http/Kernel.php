<?php

namespace App\Http;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Middleware\AlreadyLoggedIn;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Middleware\SubstituteBindings;

use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\AddQueuedCookiesToResponse;
use App\Http\Middleware\RedirectIfAuthenticated;


class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
     
        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
       
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // 'alreadyLoggedIn' => \App\Http\Middleware\AlreadyLoggedIn::class,
        'isLoggedIn' => \App\Http\Middleware\AuthCheck::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => SubstituteBindings::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        
       
    ];
}
