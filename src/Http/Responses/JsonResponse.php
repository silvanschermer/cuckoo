<?php

namespace Cuckoo\Http\Responses;


class JsonResponse implements IResponse
{
    public static function send(string $body = '', int $statusCode = 200): void
    {
        // TODO: Abstract these away
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');

        echo $body;


    }
}
