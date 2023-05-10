<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'customer' => [
            'driver' => 'session',
            'provider' => 'customer',
        ],
        'merchant' => [
            'driver' => 'session',
            'provider' => 'merchants',
        ],
        // 'dataEntryOperator' => [
        //     'driver' => 'session',
        //     'provider' => 'dataEntryOperator',
        // ],
        // 'dataAuthorizer' => [
        //     'driver' => 'session',
        //     'provider' => 'dataAuthorizer',
        // ],
        // 'deliveryPerson' => [
        //     'driver' => 'session',
        //     'provider' => 'deliveryPerson',
        // ],
        'busDriver' => [
            'driver' => 'session',
            'provider' => 'busDriver',
        ],
        // -------------------Guards for Api

        // 'api-admin' => [
        //     'driver' => 'jwt',
        //     'provider' => 'users',
        // ],
        'api-merchant' => [
            'driver' => 'jwt',
            'provider' => 'merchants',
        ],
        // 'api-dataEntryOperator' => [
        //     'driver' => 'jwt',
        //     'provider' => 'dataEntryOperator',
        // ],
        'api-busDriver' => [
            'driver' => 'jwt',
            'provider' => 'busDriver',
        ],
        // 'api-dataAuthorizer' => [
        //     'driver' => 'jwt',
        //     'provider' => 'dataAuthorizer',
        // ],
        // 'api-deliveryPerson' => [
        //     'driver' => 'jwt',
        //     'provider' => 'deliveryPerson',
        // ],
        'api-customer' => [
            'driver' => 'jwt',
            'provider' => 'customer',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],

        'merchants' => [
            'driver' => 'eloquent',
            'model' => App\Models\Merchant::class,
        ],
        // 'bus' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\Merchant::class,
        // ],

        // 'dataEntryOperator' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\MerchantUser::class,
        // ],
        'busDriver' => [
            'driver' => 'eloquent',
            'model' => App\Models\MerchantUser::class,
        ],

        // 'dataAuthorizer' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\MerchantUser::class,
        // ],

        // 'deliveryPerson' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\MerchantUser::class,
        // ],

        'customer' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'merchants' => [
            'provider' => 'merchants',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'dataEntryOperator' => [
            'provider' => 'dataEntryOperator',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'busDriver' => [
            'provider' => 'busDriver',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'dataAuthorizer' => [
            'provider' => 'dataAuthorizer',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'deliveryPerson' => [
            'provider' => 'deliveryPerson',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'customers' => [
            'provider' => 'customer',
            'table' => 'password_resets',
            'expire' => 120,
        ],
    ],

];
