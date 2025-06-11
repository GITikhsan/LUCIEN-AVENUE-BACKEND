<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Periksa apakah request mengharapkan respons JSON.
        // Jika ya, jangan redirect, biarkan Laravel mengirim error 401.
        // Jika tidak (misalnya request dari browser biasa), baru redirect ke route 'login'.
        return $request->expectsJson() ? null : route('login');
    }
}
