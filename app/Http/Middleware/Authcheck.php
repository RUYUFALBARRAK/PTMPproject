<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if((!Session()->has('loginId'))&&(!Session()->has('logincompId'))&&(!Session()->has('logincommiteeId'))&&(!Session()->has('loginunitId')))
        return redirect('welcome');
        return $next($request);
}
}
