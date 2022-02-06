<?php

namespace Cuckoo\Http\Responses;

use Cuckoo\Exceptions\Http\NotAJsonBodyException;

final class JsonResponse implements IResponse
{
    /**
     * 
     * Sends out a json Body
     * @param string $body 
     * @param int $statusCode 
     * @return void 
     */
    public static function send(string $body = '', int $statusCode = 200): void
    {
        if (is_null(json_decode($body))) {
            throw new NotAJsonBodyException();
        }
        
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');

        echo $body;


    }
}
