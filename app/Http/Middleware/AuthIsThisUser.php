<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthIsThisUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->id() == $request->user_id) {
            return $next($request);
        } else {
            return redirect()->route('usuario.index');
        }
    }
}
