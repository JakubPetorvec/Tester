<?php

namespace Mappers;
use Entities\Question;

class QuestionMapper
{
    public static function map(array $postData): Question
    {
        $result = new Question();
        $result->setId($postData["id"]);
        $result->setTestId($postData["test_id"]);
        $result->setQuestion($postData["question"]);
        $result->setType($postData["type"]);
        return $result;
    }
}