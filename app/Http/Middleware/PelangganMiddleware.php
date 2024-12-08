<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PelangganMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role == 'pelanggan') {
        // Jika role adalah pelanggan, lanjutkan request
            return $next($request);
        }
        // Jika bukan pelanggan, tampilkan pesan error
        abort(403, 'Akses ditolak! Anda bukan pelanggan.');
    }

}
