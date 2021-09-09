<?php

namespace Mappers;
use Entities\Question;

class QuestionMapper
{
    public static function map(array $row): Question
    {
        $result = new Question();
        $result->setId($row["id"]);
        $result->setQuestion($row["question"]);
        $result->setType($row["type"]);
        return $result;
    }
}