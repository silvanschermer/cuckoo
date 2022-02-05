<?php

namespace Cuckoo\Exceptions\Http;

use Exception;

class RouteNotFoundException extends Exception
{
    public function __construct(string $routeName)
    {
        parent::__construct("Route {$routeName} not found.");
    }
}