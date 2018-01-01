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

    'twitter' => [
        'client_id' => 'QtmNiuBYONQlCWhiOyFH8yVe2',         // Your TWITTER Client ID
        'client_secret' => 'zayp9uVhpHwvkWDXnoKHhoDwGdDWwwJbFwDVp3gD2333GAcXpo', // Your TWITTER Client Secret
        'redirect' => '/login/twitter/callback',
    ],

    'facebook' => [
        'client_id' => '808732392643666',         // Your FB Client ID
        'client_secret' => '3b0b2962a01a99715d0a25c2f98d7726', // Your FB Client Secret
        'redirect' => '/login/facebook/callback',
    ],

];
