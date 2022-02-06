<?php

namespace Cuckoo\Http;

use Cuckoo\Exceptions\Http\HttpMethodNotSupportedByRouteException;
use Cuckoo\Exceptions\Http\NotHttpMethodException as HttpNotHttpMethodException;
use Cuckoo\Exceptions\NotHttpMethodException;
use Cuckoo\Helpers\HttpMethodHelper;
use Exception;

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
        $this->setUpRouteDefinition($definition);
    }

    /**
     * Get $methods.
     * 
     * 
     *  @return array  */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * Get $name.
     * 
     * 
     *  @return string  */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets $methods
     * 
     * 
     * @param array $methods 
     * @return \Cuckoo\Http\Route 
     */
    public function setMethods(array $methods): self
    {
        $this->methods = $methods;

        return $this;
    }

    /**
     * Sets $name.
     * 
     * 
     * @param string $name 
     * @return \Cuckoo\Http\Route 
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Checks wether the passed method is in $methods.
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
    private function setUpRouteDefinition(array $definition) : void // TODO: NEXT
    {
        // check if the http methods are properly configured.
        $this->methods = $definition ['Methods'];
        foreach ($definition ['Methods'] as $potentialHttpMethodString) {
            if(!HttpMethodHelper::isValidHttpMethod($potentialHttpMethodString)) {
                throw new HttpNotHttpMethodException($potentialHttpMethodString, $this->name);
            }
        }

        // check if the Controller entry is properly setup.
        if (strpos($definition ['Controller'], '::') === false) {
            throw new Exception('Controller definition is missing a method ::');
        }

        $callables = explode('::', $definition ['Controller']);
        $this->controller = $callables[0];
        $this->controllerFunction = $callables[1];

        $this->controller = $definition ['Controller'];

    }

    public function call($request = array())
    {
        call_user_func_array($this->controller, $request);
    }
}
