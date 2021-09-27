<?php

namespace Parsers;

use Model\ExamTable;

class ExamParser
{
    public static function parse(array $postData): ExamTable
    {
        $examTable = new ExamTable();

        $answersTextbox = [];
        $answersButton = [];

        foreach ($postData["answer"] as $key=>$answer)
        {
            $answersTextbox[$key] = $answer;
        }

        foreach ($postData["answerButton"] as $key=>$answer)
        {
            $answersButton[$key] = $answer;
        }

        $examTable->setExamId($postData["exam_id"]);
        $examTable->setTestId($postData["test_id"]);
        $examTable->setAnswersTextbox($answersTextbox);
        $examTable->setAnswersButton($answersButton);

         return $examTable;
    }
}
