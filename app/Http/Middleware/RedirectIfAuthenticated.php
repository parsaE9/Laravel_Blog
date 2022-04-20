<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        if (Auth::guard($guard)->check()) {
//            return redirect(RouteServiceProvider::HOME);
//        }
//
//        return $next($request);

        if (Auth::guard($guard)->check()) {
            $privilege = Auth::user()->privilege;

            switch ($privilege) {
                case 'admin':
                    return redirect('/admin');
                    break;
                case 'normal':
                    return redirect('/blogs');
                    break;

                default:
                    return redirect('/');
                    break;
            }
        }
        return $next($request);
    }
}
