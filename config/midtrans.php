<?php 


return [
    'serverKey' => env('MIDTRANS_SERVER_KEY', null),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is3DS' => env('MIDTRANS_IS_3DS', true),
];

// config('midtrans.serverKey')