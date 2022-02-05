<?php

namespace Cuckoo\Http;

use stdClass;

/**
 * $_SERVER but cast to Object with getters and setters
 *  @package Cuckoo\Http */
class Server
{
    private \stdClass $server;

    public function __construct()
    {
        $this->server = (object) $_SERVER;
    }

    public function getRequestMethod()
    {
        return $this->server->REQUEST_METHOD;
    }

    public function getRequestedUrl() : string
    {
        return $this->server->REQUEST_URI;
    }
}