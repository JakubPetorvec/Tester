<?php

namespace Parsers;

use Entities\Test;

class TestParser
{
    public static function parse($postData): Test
    {
        $test = new Test();
        $test->setName($postData["name"]);
        $test->setPercentage($postData["percentage"]);
        return $test;
    }
}
