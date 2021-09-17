<?php

namespace Mappers;

use Entities\Test;

class TestMapper
{
    public static function map($postData): Test
    {
        $test = new Test();

        $test->setId($postData["id"]);
        $test->setName($postData["name"]);
        $test->setPercentage($postData["percentage"]);

        return $test;
    }
}