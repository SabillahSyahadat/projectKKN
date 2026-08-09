<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Middleware untuk memastikan user sudah login sebagai Admin.
     * Jika belum login, redirect ke halaman login admin.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('loginAdmin')->with('error', 'Silakan login sebagai admin terlebih dahulu.');
        }

        return $next($request);
    }
}
