<?php

namespace Mawuekom\Fastkit;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mawuekom\Fastkit\Skeleton\SkeletonClass
 */
class FastkitFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-fastkit';
    }
}
