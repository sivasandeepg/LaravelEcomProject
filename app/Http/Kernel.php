<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Middleware\SubstituteBindings;


class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
         // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
         \Illuminate\Routing\Middleware\ThrottleRequests::class.':api', // Throttle middleware with 'api' prefix

         \Illuminate\Routing\Middleware\SubstituteBindings::class,
         \App\Http\Middleware\EncryptCookies::class,
         \Illuminate\Session\Middleware\StartSession::class,
         'bindings',  
        ],
     
           // Add this middleware group for authentication
    'auth' => [
        \Illuminate\Auth\Middleware\Authenticate::class,
    ],

    'VerifyOTP'=>[
        \App\Http\Middleware\VerifyOTP::class,
    ],
        // Add your custom middleware group for Firebase authentication
        'firebase' => [
            \App\Http\Middleware\AuthenticateFirebase::class,
            // Other middleware if needed
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];

     
    protected $routeMiddleware = [
        // Other middleware entries...
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
         'AdminMiddleWare' => \App\Http\Middleware\AdminMiddleWare::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.firebase' => \App\Http\Middleware\AuthenticateFirebase::class,
    ];
}
 