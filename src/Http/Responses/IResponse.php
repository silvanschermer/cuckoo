<?php

namespace Cuckoo\Http\Responses;

/** 
 *  This will be Interface all Response types (e.g Views, Json) will be based upon & the router will test if the controller returns an object based on this interface return an exception or return then exit....
 * @package Cuckoo\Exceptions\Http\Responses */
interface IResponse
{
    public static function send(string $body, int $statusCode): void;
}
