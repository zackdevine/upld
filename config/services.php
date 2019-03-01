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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
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
        'enabled' => env('USE_STRIPE', false),
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'upld' => [
        'enabled' => env('UPLD_LIMITS', false),
        'filesize' => [
            'free' => env('UPLD_FILESIZE_FREE', 8),
            'basic' => env('UPLD_FILESIZE_BASIC', 100),
            'pro' => env('UPLD_FILESIZE_PRO', 500),
            'premium' => env('UPLD_FILESIZE_PREMIUM', 0),
            'none' => 0
        ],
        'retention' => [
            'free' => env('UPLD_RETENTION_FREE', 60),
            'basic' => env('UPLD_RETENTION_BASIC', 120),
            'pro' => env('UPLD_RETENTION_PRO', 356),
            'premium' => env('UPLD_RETENTION_PREMIUM', 0),
            'none' => 0
        ],
        'domains' => [
            'free' => env('UPLD_DOMAINS_FREE', 0),
            'basic' => env('UPLD_DOMAINS_BASIC', 1),
            'pro' => env('UPLD_DOMAINS_PRO', 3),
            'premium' => env('UPLD_DOMAINS_PREMIUM', 5),
            'none' => 0
        ],
    ],

];
