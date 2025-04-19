<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware yang diterapkan pada setiap request.
     *
     * Middleware ini diterapkan ke semua permintaan web.
     *
     * @var array
     */
    protected $middleware = [
        // Middleware untuk menangani pemeliharaan aplikasi
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // Middleware untuk memeriksa panjang string URL
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // Middleware untuk memfilter input pengguna
        \App\Http\Middleware\TrimStrings::class,
        // Middleware untuk memformat input null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        // Middleware untuk menangani trusted proxies
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * Middleware grup untuk stack middleware yang umum.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            
        ],

        'api' => [
            // Batasan jumlah request per menit (rate limiting)
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware route yang bisa digunakan pada route atau controller secara individu.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // 'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'auth' => \App\Http\Middleware\CheckAdmin::class,
    ];
}
