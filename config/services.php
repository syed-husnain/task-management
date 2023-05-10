<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'firebase' => [
        'type' => env('FIREBASE_TYPE', ''),
        'database_url' => env('FIREBASE_DATABASE_URL', ''),
        'project_id' => env('FIREBASE_PROJECT_ID', ''),
        'private_key_id' => env('FIREBASE_PRIVATE_KEY_ID', 'your-key'),
        'private_key' => str_replace("\\n", "\n", env('FIREBASE_PRIVATE_KEY', '')),
        'client_email' => env('FIREBASE_CLIENT_EMAIL', 'e@email.com'),
        'client_id' => env('FIREBASE_CLIENT_ID', ''),
        'auth_uri' => env('FIREBASE_AUTH_URI', ''),
        'token_uri' => env('FIREBASE_TOKEN_URI', ''),
        'auth_provider_x509_cert_url' => env('FIREBASE_AUTH_PROVIDER_X509_CERT_URL', ''),
        'client_x509_cert_url' => env('FIREBASE_CLIENT_x509_CERT_URL', ''),
        'server_key' => env('FIREBASE_SERVER_KEY'),
        'sender_id' => env('FIREBASE_SENDER_ID'),
    ],
    'smsApi' => [
        'url' => "https://www.msegat.com/gw/sendsms.php",
        'userName' => 'goget.sa',
        'apiKey' => '4426fa63f50a5419ad1b324af5665290',
        'userSender' => 'GoGet',
        'By' => 'Carton',
        'msgEncoding' => 'UTF8'
    ]

];
