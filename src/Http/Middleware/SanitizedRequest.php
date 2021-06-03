<?php

namespace Mawuekom\Fastkit\Http\Middleware;

use Closure;

class SanitizedRequest
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
        $input = $request->all();

        array_walk_recursive($input, function(&$input, $key) {
            $except = [
                'password', 'description', 
                'old_password', 'new_password',
                'meta_id'
            ];

            if (in_array($key, $except)) {
                $input = $input;
            }

            else  {
                $input = strip_tags($input);
            }
        });

        $request->merge($input);
        
        return $next($request);
    }
}
