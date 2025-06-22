<?php

namespace App\Services;

use Midtrans\Config;

class MidtransConfig
{
    public static function init()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // Ubah ke true di production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }
}
