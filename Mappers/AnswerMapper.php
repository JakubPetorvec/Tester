<?php

namespace Mappers;
use Entities\Answer;
use Tools\ReflectionMapper;

class AnswerMapper
{
    public static function map(array $row):Answer
    {
        $tmp[] = $row["answer"];
        $row["answer"] = $tmp;
        return ReflectionMapper::map(new Answer(), $row);
    }
}