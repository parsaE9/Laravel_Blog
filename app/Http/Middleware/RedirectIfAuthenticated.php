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

        if (Auth::guard($guard)->check()) {
            $privilege = Auth::user()->privilege;

            switch ($privilege) {
                case '2':
                    return redirect('/admin_panel');
                    break;
                case '1':
                    return redirect('/user_blogs');
                    break;

                default:
                    return redirect('/');
                    break;
            }
        }
        return $next($request);
    }
}
