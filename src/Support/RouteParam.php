<?php

namespace Mawuekom\Fastkit\Support;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;

/**
 * This helper makes it easier to work with parameters on the Lumen array-based router.
 *
 * Class RouteParam
 *
 * @package Mawuekom\Fastkit\Support
 */
class RouteParam
{
    /**
     * Get a route parameter from the request.
     *
     * @param Request $request
     * @param string $param
     * @return boolean
     */
    public static function exists(Request $request, $param)
    {
        return Arr::exists($request->route()[2], $param);
    }

    /**
     * Get a route parameter from the request.
     *
     * @param Request $request
     * @param string $param
     * @param mixed|null $default
     * @return mixed
     */
    public static function get(Request $request, $param, $default = null)
    {
        return Arr::get($request->route()[2], $param, $default);
    }

    /**
     * Set a route parameter on the request.
     *
     * @param Request $request
     * @param string $param
     * @param mixed $value
     */
    public static function set(Request &$request, $param, $value)
    {
        $route = $request->route();
        $route[2][$param] = $value;

        $request->setRouteResolver(function () use ($route) {
            return $route;
        });
    }

    /**
     * Forget a route parameter on the Request.
     *
     * @param Request $request
     * @param string $param
     */
    public static function forget(Request &$request, $param)
    {
        $route = $request->route();
        Arr::forget($route[2], $param);

        $request->setRouteResolver(function () use ($route) {
            return $route;
        });
    }
}