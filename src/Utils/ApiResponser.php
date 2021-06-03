<?php

namespace Mawuekom\Fastkit\Utils;

use Illuminate\Http\Response;

/**
 * Give api response with Json API Specs
 * 
 * Trait ApiResponser
 * 
 * @package Mawuekom\Fastkit\Utils
 */
trait ApiResponser
{
    /**
     * Return successed responses
     * 
     * @param mixed $data
     * @param  $code
     * 
     * @return response
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response() 
                ->json(['data' =>$data, 'code' =>$code], $code) 
                ->header('Content-Type', 'application/json');
    }

    /**
     * Return error responses
     * 
     * @param mixed $msg
     * @param mixed $code
     * 
     * @return [type]
     */
    public function errorResponse($msg, $code)
    {
        return response() 
                ->json(['error' =>$msg, 'code' =>$code], $code) 
                ->header('Content-Type', 'application/json');
    }

    /**
     * Return some messages
     * 
     * @param mixed $msg
     * @param mixed $code
     * 
     * @return [type]
     */
    public function sendMessage($msg, $code)
    {
        return response() 
                ->json(['msg' =>$msg, 'code' =>$code], $code) 
                ->header('Content-Type', 'application/json');
    }
}