<?php

namespace Cuckoo\Http;

use stdClass;

/**
 * $_SERVER but cast to Object with getters and setters
 *  @package Cuckoo\Http */
class Server
{
    private string $requestMethod = '';
    private string $requestUri = '';

    public function __construct()
    {
        $server = (object) $_SERVER;
        $this->requestMethod = $server->REQUEST_METHOD;
        $this->requestUri = $server->REQUEST_URI;
    }

    /** 
     * Get The value of requestMethod
     * 
     * @return string  */
    public function getRequestMethod() : string
    {
        return $this->requestMethod;
    }

    /**
     * 
     * Get The value of requestUri
     * 
     *  @return string  */
    public function getRequestedUrl() : string
    {
        return $this->requestUri;
    }

    /**
     * Set the value of requestUri
     *
     * @return  self
     */ 
    public function setRequestUri($requestUri) : self
    {
        $this->requestUri = $requestUri;

        return $this;
    }

    /**
     * Set the value of requestMethod
     *
     * @return  self
     */ 
    public function setRequestMethod($requestMethod) : self
    {
        $this->requestMethod = $requestMethod;

        return $this;
    }
}