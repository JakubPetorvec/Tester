<?php

namespace Parsers;
use Entities\Question;
use Tools\ReflectionMapper;

class QuestionParser extends ReflectionMapper
{
    public static function parse(array $postData, array $getData): Question
    {
        $data = [];
        foreach ($postData as $key=>$item) $data[$key] = $item;
        foreach ($getData as $key=>$item) $data[$key] = $item;
        return ReflectionMapper::map(new Question(), $data);
    }
}
