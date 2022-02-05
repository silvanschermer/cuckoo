<?php
// TODO: load Config DEBUG ON/OFF
ini_set('display_errors', 'on');

require_once(dirname(dirname(__FILE__)) . '/vendor/' . 'autoload.php');

use Cuckoo\Config\Configuration;
use Cuckoo\Kernel;

try {

    Kernel::start();
    
} catch (\Exception $e) {
    // TODO: Exception Handler here
    echo '<pre>';
    var_dump($e);
    die;
}