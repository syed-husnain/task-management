<?php

namespace App\Http;

use App\Http\Middleware\CustomerAuthenticationCheck;
use App\Http\Middleware\CustomerDeletionCheck;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
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
            \App\Http\Middleware\LanguageManager::class,
        ],

        'api' => [
            'throttle:1000,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'admin' => \App\Http\Middleware\Admin::class,
        'merchant' => \App\Http\Middleware\Merchant::class,
        'dataEntryOperator' => \App\Http\Middleware\DataEntryOperator::class,
        'busDriver' => \App\Http\Middleware\BusDriverMiddleware::class,
        'deliveryPerson' => \App\Http\Middleware\DeliveryPerson::class,
        'dataAuthorizer' => \App\Http\Middleware\DataAuthorizer::class,
        'permission' => \App\Http\Middleware\PermissionMiddleware::class,
        'merchant-permission' => \App\Http\Middleware\MerchantPermissionMiddleware::class,
        'assignGuard' => \App\Http\Middleware\AssignGuard::class,
        'jwt.verifyClaim' => \App\Http\Middleware\VerifyClaim::class,
        'citySelection' => \App\Http\Middleware\citySelection::class,
        'jwt.verify' => \App\Http\Middleware\JwtMiddleware::class,
        'checkUserAPI' => \App\Http\Middleware\CustomerDeletionCheck::class,
        'checkUserWEB' => \App\Http\Middleware\CustomerDeletionCheckWeb::class,
        'prevent-back-history' => \App\Http\Middleware\PreventBackHistory::class,
        'customerAuthCheck' => \App\Http\Middleware\CustomerAuthenticationCheck::class,
        'jwt.auth' => Tymon\JWTAuth\Http\Middleware\Authenticate::class,
        'jwt.refresh' => Tymon\JWTAuth\Http\Middleware\RefreshToken::class,
    ];
}
