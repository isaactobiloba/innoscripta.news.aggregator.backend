<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'guardian_api' => [
        'api_key' => env('GUARDIAN_API_KEY'),
        'base_url' => env('GUARDIAN_BASE_URL'),
    ],

    'news_api' => [
        'api_key' => env('NEWS_API_KEY'),
        'base_url' => env('NEWS_BASE_URL'),
    ],

    'new_york_times_api' => [
        'api_key' => env('NEW_YORK_TIMES_API_KEY'),
        'base_url' => env('NEW_YORK_TIMES_BASE_URL'),
    ],

];