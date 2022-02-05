<?php

namespace Cuckoo\Http;

use Cuckoo\Exceptions\Http\RouteNotFoundException;
use Cuckoo\Exceptions\Http\RoutesNotDefinedException;
use Exception;
use Symfony\Component\Yaml\Yaml;

class Router
{

    private array $routes = array();
    private Server $server;
    
    public function __construct()
    {
        $routeConfigFileValues = Yaml::parseFile(dirname(__FILE__) . '/routes.yaml');

        if (!isset($routeConfigFileValues['Routes'])) {
            throw new RoutesNotDefinedException();
        }
        $this->routes = $routeConfigFileValues['Routes'];

        $this->getServer(); // TODO: move to kernend and inject
    }

    public function handleRequest()
    {
        $routeName = $this->server->getRequestedUrl();

        if (!in_array($routeName, $this->routes)) {
            if (!in_array('index', $this->routes)) {
                throw new RouteNotFoundException($routeName);
            }
        }
        
        // check if the controller exists
        // check if the function exists
        // reflect on that funciton and get the request
        // throw an exception if one of the above + the request class does not exist and when the request class is not the type of the requested class, inject the class if possible ?? factory methods....
        // call user function array
        // echo hello done....

        

        // check route and request type
    }

    public function getServer()
    {
        return $this->server =  (new Server());
    }

    public function getRoute()
    {
        
    }

    public function callRouteDetails(string $routeName)
    {

    }

    public function createRequest()
    {

    }

    private function isvalidMethod() : bool
    {
        return true;
    }
}