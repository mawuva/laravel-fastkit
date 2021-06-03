<?php

namespace Mawuekom\Fastkit\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Mawuekom\Fastkit\Support\RouteParam;
use Mawuekom\Fastkit\Utils\ApiResponser;
use Mawuekom\Fastkit\Support\ResourceChecker;

class CheckResourceID
{
    use ApiResponser;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $resource)
    {
        $data = ResourceChecker::checkID($resource, RouteParam::get($request, $resource.'_id'));

        if ($data ->isEmpty()) {
            return $this ->sendMessage("Resource not found", Response::HTTP_NOT_FOUND);
        }

        return $next($request);
    }
}