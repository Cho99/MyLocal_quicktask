<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthPosts
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
        if ($request->post != Auth::id()) {
            abort(404);
        }

        return $next($request);
    }
}
