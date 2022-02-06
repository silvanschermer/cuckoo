<?php

namespace Cuckoo\Exceptions\Http;

use Exception;

class HttpMethodNotDefinedForRouteException extends Exception
{
    public function __construct()
    {
        parent::__construct('Methods are not defined for this route.');
    }
}