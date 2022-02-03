<?php

namespace Cuckoo;

use Cuckoo\Config\Configuration;
use Cuckoo\Router;

class Kernel
{
    public static function start()
    {
        (new Configuration())->handleUserConfigugration();
    }
}