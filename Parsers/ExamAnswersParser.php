<?php

namespace Parsers;

use Entities\Answer;
use Tools\ReflectionMapper;

class ExamAnswersParser
{
    public static function parse(array $postData): Answer
    {
        return ReflectionMapper::map(new Answer() ,$postData);
    }
}
