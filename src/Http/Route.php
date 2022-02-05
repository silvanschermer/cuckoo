<?php

namespace Cuckoo\Http;

class Route
{

    private array $methods = array();
    private string $name = '';
    private string $controller = '';
    private string $controllerFunction = '';

    public function __construct(string $name, array $definition)
    {
        // TODO: check $definition and if it contains all required keys and if they are set -> check if the methods are valid https methods -> then check if the controller and funciton exists -> if they are callable
        $this->name = $name;
        $this->methods = $definition;
        $this->controller = '';
        $this->controllerFunction = '';
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setMethods(array $methods): void
    {
        $this->methods = $methods;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    /**
     * Checks wether the passed method is in the objects methods array or not.
     * @param string $httpMethod 
     * @return bool 
     */
    public function isAllowedMethod(string $httpMethod): bool
    {
        return in_array($httpMethod, $this->getMethods());
    }

    /** 
     * This Method Will get the route array parsed from the routes.yaml and do all the ncecessary checks on it throw exceptions when something is off or just set all values on this classes properties if all goes well.
     * @return void  */
    private function setUpRouteDefinition() : void // TODO: NEXT
    {}
}
