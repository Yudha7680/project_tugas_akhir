<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use App\Models\Role as Rule;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // \dd($role);
        // if (! $request->user()->hasRole($role)) {

        // }else  {

        // }
        if (Auth::check()) {
            $role = Rule::find(Auth::user()->role_id)->name;
        }

        return $next($request);
    }
}
