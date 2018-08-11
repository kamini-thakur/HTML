<?php

namespace App\Http\Middleware;

use Closure;

class IsAppInstalled
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
        if (!$request->session()->exists('shop')) {
            // user value cannot be found in session
            $baseURL = env("APP_URL");
            return redirect($baseURL);
        }
        return $next($request);
    }
}
