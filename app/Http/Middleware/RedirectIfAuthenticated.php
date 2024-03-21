<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $route = '/welcome';
                switch (Auth::user()->role) {
                    case 'admin':
                        $route = '/admin';
                        break;
                    case 'dokter':
                        $route = '/doctor';
                        break;
                    case 'pasien':
                        $route = '/patient';
                        break;
                }
                return redirect($route);
            }
        }

        return $next($request);
    }
}
