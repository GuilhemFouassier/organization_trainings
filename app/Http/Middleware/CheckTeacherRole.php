<?php

namespace App\Http\Middleware;

use Closure;

class CheckTeacherRole
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
        if (\Auth::user()->role == 'teacher')
            return $next($request);
        else
            die('accès refusé');
    }
}
