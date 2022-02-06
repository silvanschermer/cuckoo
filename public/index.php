<?php

require_once(dirname(dirname(__FILE__)) . '/vendor/' . 'autoload.php');

use Cuckoo\Config\Configuration;
use Cuckoo\Http\Responses\JsonResponse;
use Cuckoo\Kernel;

try {
    // Everything has a beginning... and an end.
    return Kernel::start();
} catch (\Exception $e) {
    // TODO: Exception Handler here
    if (!Configuration::isDebug()) {
        $body = json_encode(['Error' => ['Message' => 'An Unexpected Error Occured. Contact a  site admin.']]);
        JsonResponse::send($body);
    } else {
        echo '<pre>';
        var_dump($e);
    }

    return;
}
