<?php

namespace Cuckoo\Exceptions\Http;

use Exception;

class RouteControllerMethodNotCallableException extends Exception
{
    public function __construct()
    {
        parent::__construct('Defined Route Controller is not a callable method.');
    }
}