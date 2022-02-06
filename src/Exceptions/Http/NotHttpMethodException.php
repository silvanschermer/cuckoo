<?php

namespace Cuckoo\Exceptions\Http;

use Exception;

class NotHttpMethodException extends Exception
{
    public function __construct(string $notAHttpMethod)
    {
        parent::__construct("{$notAHttpMethod} is not a valid HTTP Method... ");
    }
}