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

    public function requestMethod()
    {
        return $this->server->REQUEST_METHOD;
    }

    public function getRequestedUrl() : string
    {
        return $this->server->REQUEST_URI;
    }
}