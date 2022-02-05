<?php

namespace Cuckoo\Exceptions\Http;

use Exception;

class RoutesNotDefinedException extends Exception

{
    public function __construct()
    {
        parent::__construct('Routes are not defined.');
    }
}