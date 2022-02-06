<?php

namespace Cuckoo\Config;

use Symfony\Component\Yaml\Yaml;

class Configuration
{

    private  array $config = array(); // array parsed by Yaml::parsefile

    public function __construct()
    {
        $this->config = Yaml::parseFile(dirname(__FILE__) . '/config.yaml');
    }

    /**
     * Configuration features will be integrated from here. Eg. Handle debugmode etc. Add new configuration features here.
     * Sets e.g Ini values.
     * 
     * 
     *  @return void  */
    public function handleUserConfigugration(): void
    {
        $this->handleDebugMode();
    }

    /**
     * When Called it will check if Debug var isset and depending on the boolean value ini_set display_errors
     * 
     * 
     *  @return void  */
    private function handleDebugMode(): void
    {
        if ((new self())->isDebug()) {
            ini_set('display_errors', 'on');
        } else {
            ini_set('display_errors', 'off');
        }
    }


    /**
     * Checks wether Debug is true or false,
     * 
     * 
     *  @return bool  */
    public static function isDebug(): bool
    {
        $isDebug = Configuration::get('DEBUG');

        return $isDebug;
    }

    /**
     * Get the specified config option.
     * 
     * 
     * @param string $name 
     * @return string 
     */
    public static function get(string $name): string
    {
        $value = (new self())->config[$name];

        if (isset($value) && !is_null($value)) {
            return $value;
        }

        return ''; // TODO: Log a warning when this case is hit.
    }
}
