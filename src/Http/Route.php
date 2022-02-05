<?php

namespace Cuckoo\Http;

class Route
{

    private array $methods = array();
    private string $name = '';

    public function __construct(string $name, array $methods)
    {
        $this->name = $name;
        $this->methods = $methods;
    }

    public function getMethods() : array
    {
        return $this->methods;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setMethods(array $methods) : void
    {
        $this->methods = $methods;
    }
    
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    public function isAllowedMethod(string $httpMethod) : bool
    {
        return in_array($httpMethod, $this->getMethods());
    }
    
}