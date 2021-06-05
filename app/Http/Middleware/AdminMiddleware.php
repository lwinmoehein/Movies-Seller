<?php

namespace App\Http\Middleware;

use App\Role;
use App\RolesType;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        $adminRole = Role::where('name',RolesType::ADMIN)->first()->id;

        if ($adminRole==null || Auth::user()==null || !Auth::user()->roles->pluck('id')->contains($adminRole)) {
            return redirect('/');
        }

        return $next($request);
    }
}
