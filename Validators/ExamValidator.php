<?php

namespace Validators;

class ExamValidator
{
    public static function validate($postData, &$errors):bool
    {
        $isValid = true;

        if($postData["name"] === "")
        {
            $isValid = false;
            array_push($errors, "Name is Missing!");
        }

        return $isValid;
    }
}
