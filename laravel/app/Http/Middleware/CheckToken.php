<?php

namespace App\Http\Middleware;


class CheckToken
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
        // $key = '1608B';

        // $token = $request->token;

        // return  JWT::decode($token,$key,['HS256']);

        

        return $next($request);
    }
}
