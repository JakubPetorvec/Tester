<?php

namespace Validators;

use Entities\Answer;

class AnswerValidator
{
    public static function validate(Answer $answer,array &$error): bool
    {
        $isValid = true;

        if($answer->getAnswer() === "")
        {
            $isValid = false;
            array_push($error, "Answer is Missing!");
        }

        return $isValid;
    }
}
