<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Lang;

class Localization
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
        $language = Session::get('language');
        if(!$language) {
            $language == 'vi';
        }
        Lang::setLocale($language);
        
        return $next($request);
    }
}
