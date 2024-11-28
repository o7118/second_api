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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'facebook' => [
        'client_id' => env('462370256480852'),
        'client_secret' => env('624ebe9993aa2d5559ec63f66df0e1fb'),
        'redirect' => env('http://localhost:8000/auth/facebook/callback'),
    ],

    'google' => [
        'client_id' => env('776770109773-k0301pqvhmf2locql55lc285k61nc7mm.apps.googleusercontent.com'),
        'client_secret' => env('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'),
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],


];
