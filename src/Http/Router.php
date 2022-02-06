<?php

namespace Cuckoo\Http;

use Cuckoo\Exceptions\Http\HttpMethodNotSupportedByRouteException;
use Cuckoo\Exceptions\Http\RouteNotFoundException;
use Cuckoo\Exceptions\Http\RoutesNotDefinedException;
use Exception;
use Symfony\Component\Yaml\Yaml;

class Router
{

    private array $routes = array(); // parsed array from routes.yaml
    private Route $route; // The requested Route but as an object
    private Server $server;
    // TODO: DI Cointainer injects current route

    public function __construct()
    {
        $routeConfigFileValues = Yaml::parseFile(dirname(__FILE__) . '/routes.yaml');

        if (!isset($routeConfigFileValues['Routes'])) {
            throw new RoutesNotDefinedException();
        }

        $this->routes = $routeConfigFileValues['Routes'];

        $this->server = new Server(); // TODO: DI
    }

    /**
     * This will compare the current request to a matching routing entry.
     * If it is found and checks complete a viable controller function is called.
     * 
     * @return void
     */
    public function handleRequest(): void
    {
        $routeName = $this->server->getRequestedUrl();
        // checks if the route exists and returns it.
        $routeDefinitionArray = $this->getRouteArray($routeName);

        $route = new Route($routeName, $routeDefinitionArray); // TODO: eill be moved to DI container + initialization at constructor
        $this->callRoute($route);
    }

    /**
     * Gets Current Server or Creates and returns a new Server instance. 
     * 
     * 
     * 
     * @return \Cuckoo\Http\Server  */
    public function getServer(): Server
    {
        return $this->server;
    }

    /**
     * Get $routes;
     * 
     * 
     *  @return array  */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * Gets the defined route parameters for the provided routename. This provides similar Functionality as route exists but with the found route array if there is one.
     * 
     * 
     * @param string $routeName 
     * @return array 
     * @throws \Cuckoo\Exceptions\Http\RouteNotFoundException 
     */
    public function getRouteArray(string $routeName): array
    {
        if (!array_key_exists($routeName, $this->routes)) {
            throw new RouteNotFoundException($routeName);
        }

        return $this->routes[$routeName];
    }

    /**
     * Decorator for $route->call()
     * 
     * 
     * @param \Cuckoo\Http\Route $route 
     * @return void 
     */
    private function callRoute(Route $route): void
    {
        $route->call();
    }
}
