<?php

namespace Parsers;

use Entities\Answer;
use Entities\Question;

class ExamParser
{
    public static function parse(array $postData, int $examId): array
    {
        $questions = [];
        $answers = [];

        foreach ($postData["question"] as $key=>$question) array_push($questions, $key);
        foreach ($postData["answer"] as $answer) array_push($answers, $answer);

        return ["question" => $questions, "answers" => $answers, "examId" => $examId];
    }
}
