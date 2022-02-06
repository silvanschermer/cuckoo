<?php

namespace Cuckoo\Exceptions\Http;

use Exception;

class NotAJsonBodyException extends Exception
{
    public function __construct()
    {
        parent::__construct('Provided body is not json decodable.');
    }
}
