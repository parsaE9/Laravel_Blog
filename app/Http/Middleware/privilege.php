<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Privilege as Middleware;
use Illuminate\Support\Facades\Auth;

class Privilege {

    public function handle($request, Closure $next, String $privilege) {
        if (!Auth::check())
            return redirect('/login');

        $user = Auth::user();
        if($user->privilege == $privilege)
            return $next($request);

        return redirect('/');
    }
}