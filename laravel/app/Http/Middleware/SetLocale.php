<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
        return 1;
        if (Session::has('locale') && in_array(Session::get('locale'), ['en', 'zh'])) {
            App::setLocale(Session::get('locale'));
        } else {
            App::setLocale('en');
        }
        return $next($request);

    }
}
