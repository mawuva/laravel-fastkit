<?php

namespace Mawuekom\Fastkit\Support;

use Illuminate\Support\Facades\DB;

/**
 * Resource checker
 * 
 * Class ResourceChecker
 * 
 * @package Mawuekom\Fastkit\Support
 */
class ResourceChecker
{
    /**
     * Check resource in database 
     * 
     * @param $table
     * @param array $clauses
     * 
     * @return mixed
     */
    public static function checkResourceInDatabase($table, $clauses = [])
    {
        return DB::table($table) 
                    ->where([$clauses])
                    ->get();
    }

    /**
     * Check resource's ID in database 
     * 
     * @param $resource
     * @param array $resource_id
     * 
     * @return mixed
     */
    public static function checkID($resource, $resource_id)
    {
        $length = strlen($resource);

        if (strtolower($resource[($length - 1)]) == 'y') {
            return DB::table(substr_replace($resource, "ies", -1))
                        ->where($resource.'_id', '=', $resource_id)
                        ->get();
        }

        else {
            return DB::table($resource.'s')
                        ->where($resource.'_id', '=', $resource_id)
                        ->get();
        }
    }

    /**
     * Check resource's meta ID in database 
     * 
     * @param $table
     * @param array $meta_id
     * 
     * @return mixed
     */
    public static function checkMetaID($table, $meta_id)
    {
        return DB::table($table) 
                    ->where('meta_id', '=', $meta_id)
                    ->get();
    }
}