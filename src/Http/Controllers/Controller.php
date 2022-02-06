<?php

namespace Cuckoo\Http\Controllers;

use Cuckoo\Http\Responses\JsonResponse;

class Controller extends BaseController
{
    public function index($request) : JsonResponse
    {
        $body = json_encode(['Message' => 'Cuckoo!']);
        return JsonResponse::send($body);

    }
}
