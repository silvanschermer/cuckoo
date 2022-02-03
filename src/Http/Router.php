<?php

namespace Cuckoo\Http;

use Symfony\Component\Yaml\Yaml;

class Router
{

    private array $routes = array();
    private Server $server;
    
    public function __construct()
    {
        $routes = $value = Yaml::parseFile(dirname(__FILE__) . '/routes.yaml');
    }

    public function handleRequest()
    {
        $server = $this->getServer();
        // get route
        echo '<pre>';var_dump($server);
        // check route and request type
    }

    public function getServer()
    {
        return $this->server =  (new Server());
    }

    public function getRoute()
    {

    }

    public function callRoute()
    {

    }

    public function createRequest()
    {

    }
}