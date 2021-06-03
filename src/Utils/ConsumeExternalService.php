<?php

namespace Mawuekom\Fastkit\Utils;

use GuzzleHttp\Client;

/**
 * Allows to consume external services or API
 * 
 * Trait ConsumeExternalService
 * 
 * @package Mawuekom\Fastkit\Utils
 */
trait ConsumeExternalService
{
    /**
     * Perform requets to consume external API
     * 
     * @param $method
     * @param $requestUrl
     * @param array $formParams
     * @param array $headers
     * 
     * @return mixed
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client(['base_uri' =>$this ->baseUri]);

        $headers['Accept'] = 'application/json';
        $headers['X-localization'] = app() ->getLocale();

        if(isset($this ->secret)) {
            $headers['Authorization'] = 'Bearer '.$this ->secret;
        }

        $response = $client ->request($method, $this ->baseUri . $requestUrl, [
            'form_params' => $formParams,
            'headers'     => $headers,
        ]);

        return $response ->getBody() ->getContents();
    }

    /**
     * Perform GET requets to consume external API
     * 
     * @param $requestUrl
     * @param array $formParams
     * @param array $headers
     * 
     * @return mixed
     */
    public function getRequest($requestUrl, $formParams = [], $headers = [])
    {
        return $this ->performRequest('GET', $requestUrl, $formParams, $headers);
    }

    /**
     * Perform POST requets to consume external API
     * 
     * @param $requestUrl
     * @param array $formParams
     * @param array $headers
     * 
     * @return mixed
     */
    public function postRequest($requestUrl, $formParams = [], $headers = [])
    {
        return $this ->performRequest('POST', $requestUrl, $formParams, $headers);
    }

    /**
     * Perform PUT requets to consume external API
     * 
     * @param $requestUrl
     * @param array $formParams
     * @param array $headers
     * 
     * @return mixed
     */
    public function putRequest($requestUrl, $formParams = [], $headers = [])
    {
        return $this ->performRequest('PUT', $requestUrl, $formParams, $headers);
    }

    /**
     * Perform DELETE requets to consume external API
     * 
     * @param $requestUrl
     * @param array $formParams
     * @param array $headers
     * 
     * @return mixed
     */
    public function deleteRequest($requestUrl, $formParams = [], $headers = [])
    {
        return $this ->performRequest('DELETE', $requestUrl, $formParams, $headers);
    }
}