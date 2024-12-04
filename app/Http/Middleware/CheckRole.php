<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Jika pengguna belum login
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'Anda harus login terlebih dahulu');
        }
    
        // Jika role pengguna tidak sesuai
        if (Auth::user()->role !== (int)$role) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }
    
        // Jika role sesuai, lanjutkan ke request berikutnya
        return $next($request);
    }
    
}
