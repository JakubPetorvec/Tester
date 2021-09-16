<?php

namespace Parsers;

use Entities\Test;

class TestParser
{
    public function parse($postData): Test
    {
        $test = new Test();
        $test->setTestName($postData["testName"]);
        $test->setTestPercentage($postData["testPercentage"]);
        return $test;
    }
}
