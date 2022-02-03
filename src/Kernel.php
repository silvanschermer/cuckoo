<?php

namespace Cuckoo;

use Cuckoo\Config\Configuration;
use Cuckoo\Http\Router;

class Kernel
{
    public static function start() : void
    {
        (new Configuration())->handleUserConfigugration();
        (new Router)->handleRequest();
    }
}