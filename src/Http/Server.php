<?php

namespace Cuckoo\Http;

use stdClass;

class Server
{
    private \stdClass $server;

    public function __construct()
    {
        $this->server = (object) $_SERVER;
    }

    public function getRequestedRoute()
    {

    }

    public function getHttpRequestType()
    {

    }
}