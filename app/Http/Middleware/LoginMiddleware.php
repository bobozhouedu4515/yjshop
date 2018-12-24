<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Role;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles=Role::all ();
//        dd ($roles);
        if (!auth ('admin')->check ()||!auth ('admin')->user ()->hasAnyRole($roles)){
            return back ()->with ('danger','forbidden');
        }
        return $next($request);
    }
}
