<?php

namespace Parsers;
use Entities\Question;

class QuestionParser{
    public static function parse(array $postData, array $getData): Question
    {
        $question = new Question();
        $question->setQuestion($postData["question"]);
        $question->setType($postData["type"]);
        $question->setTestId($getData["test_id"]);
        return $question;
    }
}
