<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        return null; // Supaya tidak redirect, cukup beri 401 Unauthorized
    }
}


}
