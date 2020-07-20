<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class GuestMiddleware
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
        if($request->user() && $request->user()->role !="guest"){
            return response(view('unauthorize')->with('role'), 'GUEST');
        }
        return $next($request);
    }
}
