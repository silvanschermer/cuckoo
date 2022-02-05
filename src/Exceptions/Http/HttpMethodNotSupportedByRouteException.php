<?php

namespace Cuckoo\Exceptions\Http;

use Exception;

class HttpMethodNotSupportedByRouteException extends Exception
{
    public function __construct(string $method, string $routeName)
    {
        parent::__construct("{$method} not Supported by route: ${routeName}");
    }
}