<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah user sudah login di guard admin
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        // Periksa apakah user yang login memiliki role admin
        $user = Auth::guard('admin')->user();
        if ($user->role !== 'admin') {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')
                ->withErrors(['auth' => 'You don\'t have admin privileges']);
        }
        
        return $next($request);
    }
}