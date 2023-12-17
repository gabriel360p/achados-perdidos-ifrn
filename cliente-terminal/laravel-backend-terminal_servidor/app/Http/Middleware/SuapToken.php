<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SuapToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) //: Response
    {
        return response($_SERVER['HTTP_AUTHORIZATION']);
        // try {
        //     if ($_SERVER['HTTP_AUTHORIZATION']) {
        //         return $next($request);
        //     } else {
        //         return response(['erro' => "No autorizado"], 401);
        //     }
        // } catch (\ErrorException $th) {
        //     return response($th, 500);
        // }
    }
}
