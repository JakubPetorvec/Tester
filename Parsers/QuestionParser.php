<?php

namespace Parsers;
use Entities\Question;

class QuestionParser{
    public static function parse(array $postData, array $getData): Question
    {
        $question = new Question();

        if (isset($getData["question_id"])) $question->setId($getData["question_id"]);
        if (isset($postData["question"])) $question->setQuestion($postData["question"]);
        if (isset($postData["type"])) $question->setType($postData["type"]);
        if (isset($getData["test_id"])) $question->setTestId($getData["test_id"]);

        return $question;
    }
}
