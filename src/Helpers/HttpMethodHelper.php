<?php

namespace Cuckoo\Helpers;

class HttpMethodHelper
{
    const METHODS = array(
        'GET',
        'POST',
        'PUT',
        'DELETE',
        'HEAD',
        'CONNECT',
        'OPTIONS',
        'TRACE',
        'PATCH',
    );

    /**
     * Checks If It a valid HTTP Method
     * 
     * 
     * @param string $httpMethod 
     * @return bool 
     */
    public static function isValidHttpMethod(string $httpMethod) : bool
    {
        return in_array($httpMethod, SELF::METHODS);
    }  
}