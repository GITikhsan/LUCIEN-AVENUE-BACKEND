<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    */

    'paths' => [
        'api/*', 
        'sanctum/csrf-cookie', 
        'ping' // <-- Perubahan 1: Menambahkan 'ping' agar diizinkan
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:5173' // <-- Perubahan 2: Menyesuaikan port dengan error Anda
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Mengizinkan semua header untuk kemudahan development

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // Mengizinkan pengiriman cookie/kredensial

];