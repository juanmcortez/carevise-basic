<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('COMPANY_NAME', 'Laravel'),
    'short-name' => env('COMPANY_NAME_SHORT', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Company Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your company, which will be used when the
    | framework needs to place the company's name in a notification or
    | other UI elements where a company name needs to be displayed.
    |
    */

    'address' => env('COMPANY_ADDRESS', 'Blvd. San Juan 200, X5000ATP Córdoba'),

    /*
    |--------------------------------------------------------------------------
    | Company Phone
    |--------------------------------------------------------------------------
    |
    | This value is the phone of your company, which will be used when the
    | framework needs to place the company's phone in a notification or
    | other UI elements where a company phone needs to be displayed.
    |
    */

    'phone' => env('COMPANY_PHONE', '+54 9 351 000-0000'),

    /*
    |--------------------------------------------------------------------------
    | Company Links
    |--------------------------------------------------------------------------
    |
    | This value is the link of your company, which will be used when the
    | framework needs to place the company's link in a notification or
    | other UI elements where a company link needs to be displayed.
    |
    */

    'github' => env('COMPANY_GITHUB', 'https://github.com/juanmcortez/Carevise-basic'),
    'gitlab' => env('COMPANY_GITLAB', 'https://gitlab.com/juanmcortez/Carevise-basic'),
    'instagram' => env('COMPANY_INSTAGRAM', '/'),
    'X' => env('COMPANY_X', '/'),
    'facebook' => env('COMPANY_FACEBOOK', '/'),

    /*
    |--------------------------------------------------------------------------
    | Default values
    |--------------------------------------------------------------------------
    */

    'pagination' => [
        'size' => 10,
        'long' => 25,
    ],

    'formats' => [
        'date' => 'M d, Y',
        'datetime' => 'M d, Y H:i',
        'db_date' => 'Y-m-d',
        'db_datetime' => 'Y-m-d H:i:s',
    ],
];
