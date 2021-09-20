<?php

namespace Parsers;

use Entities\Answer;
use Entities\Question;

class ExamParser
{
    public static function parse(array $postData): array
    {
        $data = [];
        $questions = new Question();
        $answers = new Answer();

        foreach ($postData["question"] as $questionData)
        {
            $question = new Question();

            //$data["question"] = $question->se
        }


        return $data;
    }
}
