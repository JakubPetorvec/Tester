<?php

namespace Parsers;

class EvaluationParser
{
    public static function parse($postData): array
    {
        $data["testLenght"] = $postData["testLenght"];
        (float)$rightAnswers = 0;

        if(isset($postData["isRight"])) foreach ($postData["isRight"] as $isRight) $rightAnswers++;

        $data["rightAnswers"] = $rightAnswers;
        return $data;
    }
}
