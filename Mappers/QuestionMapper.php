<?php

namespace Mappers;

use Entities\Question;
use Tools\ReflectionMapper;

class QuestionMapper
{
    public static function map(array $postData): Question
    {
        return ReflectionMapper::map(new Question(), $postData);
    }
}