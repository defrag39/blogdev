<?php

namespace App\Http\Middleware;

use Closure;

class admchck
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
      if (Auth::check() && Auth::user()->isAdmin()=='1') {
          return $next($request);
      } elseif (Auth::check() && Auth::user()->isAdmin()=='2') {
          return abort(403, 'Anti begal area');
      }
    }
}
