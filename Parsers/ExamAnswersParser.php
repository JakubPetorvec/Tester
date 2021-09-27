<?php

namespace Parsers;

use Model\ExamTable;

class ExamAnswersParser
{
    public static function parse(array $postData): array
    {
        return $postData["answer"]; 
    }
}
