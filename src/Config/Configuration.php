<?php

namespace Cuckoo\Config;

use Symfony\Component\Yaml\Yaml;

class Configuration

{

    private  array $config = array();

    public function __construct()
    {
        $this->config = Yaml::parseFile(dirname(__FILE__) . '/config.yaml');        
    }

    public function handleUserConfigugration()
    {
        $this->handleDebugMode();
    }

    private function handleDebugMode()
    {        
        if ((new self())->isDebug()) {
            ini_set('display_errors', 'on');
        }
    }


    public static function isDebug() : bool
    {
        $isDebug = Configuration::get('DEBUG');

        return $isDebug;
    }

    public static function get(string $name) : string
    {
        $value = (new self())->config[$name];
        
        if (isset($value) && !is_null($value)) {
            return $value;
        }

        return '';
    }
}