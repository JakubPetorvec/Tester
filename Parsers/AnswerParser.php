<?php

namespace Parsers;
use Entities\Answer;
use Tools\ReflectionMapper;

class AnswerParser extends  ReflectionMapper
{
    public static function parse(array $postData, array $getData): Answer
    {
        $data = [];
        foreach ($postData as $key=>$item)
        {
            if($key === "answer")
            {
                $tmp[] = $item;
                $data[$key] = $tmp;
            }
            else $data[$key] = $item;
        }
        foreach ($getData as $key=>$item)
        {
            if($key === "answerId") $data["id"] = $item;
            else $data[$key] = $item;
        }
        return ReflectionMapper::map(new Answer(), $data);
    }
}