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

    'google' => [
       'client_id' => '664261755728-rgpicrkq7hstnp1t4l6k5j7dc8ulm8la.apps.googleusercontent.com',
       'client_secret' => 'kig51FiPG78RUJxvdj_klW1d',
      // 'redirect' => 'http://localhost/blog/callback/google',
         'redirect' => 'http://cv.cpixels.me/callback/google',
   ],
   'facebook' => [
     'client_id' => '344840016885999',
     'client_secret' => '36df1a123fc843d9cdc57529aa4e6666',
     //'redirect' => 'http://localhost/blog/callback/facebook',
     'redirect' => 'http://cv.cpixels.me/callback/facebook',
   ],

];
