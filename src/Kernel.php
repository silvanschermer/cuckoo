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

        // capture the request pars and modify then pass the cooked request to handlerequest which will reflect on the controller parameters look for some class of type ?baserequest? and  inject
        // the captured request can be handled by e.g. a google captcha middleware... if the code is accepted we can continue and handle request as normal. At this point at max a generic request post or get object should exist from which a specific request with field validation can be cast upont it.
        (new Router())->handleRequest();
    }
}