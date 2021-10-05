<?php

namespace Validators;

use Entities\Question;

class QuestionValidator
{
    public static function validate(Question $questionData, &$errors): bool
    {
        $isValid = true;

        if($questionData->getQuestion() === "")
        {
            $isValid = false;
            array_push($errors, "Question is missing!");
        }
        return $isValid;
    }
}
