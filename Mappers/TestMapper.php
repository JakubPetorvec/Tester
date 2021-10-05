<?php

namespace Mappers;

use Entities\Test;
use Tools\ReflectionMapper;

class TestMapper
{
    public static function map($postData): Test
    {
        return ReflectionMapper::map(new Test(), $postData);
    }
}