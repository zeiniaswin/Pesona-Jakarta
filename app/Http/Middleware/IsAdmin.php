<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware IsAdmin - hanya mengizinkan pengguna ber-role 'admin'
 * mengakses halaman panel admin.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class IsAdmin
{
    /**
     * Deskripsi : Memeriksa status login dan role pengguna.
     * I.S.      : request masuk ke route admin.
     * F.S.      : request diteruskan (admin) atau dialihkan ke halaman login.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login')
                ->with('error', 'Silakan login sebagai admin terlebih dahulu.');
        }

        return $next($request);
    }
}