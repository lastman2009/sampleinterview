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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '197038571125455',
    'client_secret' => 'c258e8d1220717c056bf529af6b280ce',
    'redirect' => 'http://localhost:8000/callback',
],

'google' => [
    'client_id' => 'AIzaSyA9ZJSaDWDwvkvSH918mfs-FFJmWKqjaJI',
    'client_secret' => 'AIzaSyDA6PpNi_Ia_7jPI23_tcj2HbOcN8y2Thc
',
    'redirect' => 'http://localhost:8000/callback/google',
],

];
