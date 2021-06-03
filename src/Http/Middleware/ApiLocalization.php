<?php

namespace Mawuekom\Fastkit\Http\Middleware;

use Closure;

class ApiLocalization
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
        if ($request ->hasHeader("X-localization")) {
            $local = $request ->header("X-localization");
        } 
        
        else {
            $local = env('DEFAULT_LOCALE', 'en');
        }

        app() ->setLocale($local);

        return $next($request);
    }
}