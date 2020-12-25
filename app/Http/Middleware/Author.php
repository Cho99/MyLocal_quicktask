<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Post;

class Author
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
        //dd($request->post);
        $post = Post::findOrFail($request->post);
        if($post->user_id !== Auth::id()) {
            abort(404);
        }

        return $next($request);
    }
}
