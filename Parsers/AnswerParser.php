<?php

namespace Parsers;
use Entities\Answer;

class AnswerParser
{
    public static function parse(array $postData, array $getData): Answer
    {
        $answer = new Answer();

        if(isset($getData["answer_id"])) $answer->setId($getData["answer_id"]);
        if(isset($getData["test_id"])) $answer->setTestId($getData["test_id"]);
        if(isset($getData["question_id"])) $answer->setQuestionId($getData["question_id"]);
        if(isset($postData["answer"])) $answer->setAnswer($postData["answer"]);
        if(isset($postData["value"])) $answer->setValue($postData["value"]);

        return $answer;
    }
}