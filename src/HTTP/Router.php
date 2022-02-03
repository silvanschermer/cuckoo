<?php

namespace Cuckoo;

use Symfony\Component\Yaml\Yaml;

class Router
{

    private array $routes = array();
    
    public function __construct()
    {
        $routes = $value = Yaml::parseFile(dirname(__FILE__) . '/HTTP/routes.yaml');
    }
}