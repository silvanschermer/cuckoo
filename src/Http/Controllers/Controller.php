<?php

namespace Cuckoo\Http\Controllers;

use Cuckoo\Http\Controllers\BaseController;

class Controller extends BaseController
{
    public function index($request)
    {
        // Replace this by a response class that can set the body and the http emthod
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(200);
        echo  json_encode(['Message' => 'Cuckoo!']);
    }
}
