<?php

use Cuckoo\Helpers\HttpMethodHelper;
use PHPUnit\Framework\TestCase;

class HttpHelperTest extends TestCase
{
    public function testIsValidHttpMethod()
    {
        $this->assertSame(true, HttpMethodHelper::isValidHttpMethod('GET'));
    }
}