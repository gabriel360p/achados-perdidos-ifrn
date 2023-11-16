<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class suapToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if ($_COOKIE['suapToken']) {
                return $next($request);
            } else {
                return redirect('/');
            }
        } catch (\Throwable $th) {
            // dd( $th);
            return redirect('/');
        }
    }
}
