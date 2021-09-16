<?php

namespace Mappers;

use Entities\Test;

class TestMapper
{
    public static function map($postData): Test
    {
        $test = new Test();

        $test->setId($postData["id"]);
        $test->setTestName($postData["name"]);
        $test->setTestPercentage($postData["percentage"]);

        return $test;
    }
}