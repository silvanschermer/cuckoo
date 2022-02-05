<?php

namespace Cuckoo;

use Cuckoo\Config\Configuration;
use Cuckoo\Http\Router;

/** 
 * This class will bootstrap the entire application.
 * @package Cuckoo */
class Kernel
{
    /**
     * Starts and Handles the user Configuration & Initializes request routing.
     * 
     * @return void 
     * @throws \Cuckoo\Exceptions\Http\RouteNotFoundException 
     * @throws \Cuckoo\Exceptions\Http\HttpMethodNotSupportedByRouteException 
     */
    public static function start() : void
    {
        (new Configuration())->handleUserConfigugration();
        (new Router())->handleRequest();
    }
}