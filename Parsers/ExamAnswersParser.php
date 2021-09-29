<?php

namespace Parsers;

class ExamAnswersParser
{
    public static function parse(array $postData): array
    {
        if(isset($postData["answer"])) return $postData["answer"];
        return [];
    }
}
