<?php

namespace Cuckoo\Http\Controllers;

use Cuckoo\Http\Responses\JsonResponse;

class Controller extends BaseController
{

    private int  $test = 123;

    public function index($request) : JsonResponse
    {
        $this->test;
        $body = json_encode(['Message' => 'Cuckoo!']);
        return JsonResponse::send($body);

    }
}
