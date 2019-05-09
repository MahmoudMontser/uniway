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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '827625755271-d7kup2dvk0fg0oeiirm092j6t2409hng.apps.googleusercontent.com',
        'client_secret' => 'WLOfrB-gZpkRpW0pzebwc1yf',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],
    'facebook' => [
        'client_id' => '577937066016286',
        'client_secret' => '189144641e1130c091108c4bce7130f3',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

];
