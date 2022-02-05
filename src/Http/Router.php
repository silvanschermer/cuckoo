<?php

namespace Cuckoo\Http;

use Cuckoo\Exceptions\Http\HttpMethodNotSupportedByRouteException;
use Cuckoo\Exceptions\Http\RouteNotFoundException;
use Cuckoo\Exceptions\Http\RoutesNotDefinedException;
use Exception;
use Symfony\Component\Yaml\Yaml;

class Router
{

    private array $routes = array();
    private Server $server;
    // TODO: Inject Routes
    public function __construct()
    {
        $routeConfigFileValues = Yaml::parseFile(dirname(__FILE__) . '/routes.yaml');

        if (!isset($routeConfigFileValues['Routes'])) {
            throw new RoutesNotDefinedException();
        }
        $this->routes = $routeConfigFileValues['Routes'];

        $this->getServer(); // TODO: move to kernend and inject
    }

    /**
     * This will ompare the current request to a matching routing entry.
     * If it is found and checks complete a viable controller function is called and.
     * 
     * @return void 
     * @throws \Cuckoo\Exceptions\Http\RouteNotFoundException 
     * @throws \Cuckoo\Exceptions\Http\HttpMethodNotSupportedByRouteException 
     */
    public function handleRequest() : void
    {
        $routeName = $this->server->getRequestedUrl();

        if (!array_key_exists($routeName, $this->routes)) {
            throw new RouteNotFoundException($routeName);
        }

        $route = new Route( $routeName, $this->routes[$routeName] );
        $method = $this->server->requestMethod();
        if( ! $route->isAllowedMethod($method) ) {
            throw new HttpMethodNotSupportedByRouteException($method, $routeName);
        }

        
        // check if the controller exists
        // check if the function exists
        // reflect on that function parameters and create the request object
        // throw an exception if one of the above + the request class does not exist and when the request class is not the type of the requested class, inject the class if possible ?? factory methods....
        // call user function array
        // echo hello done....

        

        // check route and request type
    }

    /**
     * Creates and returns a new Server instance. 
     * @return \Cuckoo\Http\Server  */
    public function getServer() : Server
    {
        return $this->server =  (new Server());
    }

}