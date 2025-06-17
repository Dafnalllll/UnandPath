<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfDashboardOwner
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($request->is('dashboard') && $user->role === 'admin') {
            return redirect('/admin');
        }

        if ($request->is('admin') && $user->role === 'user') {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
