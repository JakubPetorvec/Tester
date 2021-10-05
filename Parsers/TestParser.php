<?php

namespace Parsers;

use Entities\Test;
use Tools\ReflectionMapper;

class TestParser
{
    public static function parse($postData): Test
    {
        return ReflectionMapper::map(new Test(), $postData);
    }
}
