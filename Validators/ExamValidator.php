<?php

namespace Validators;

class ExamValidator
{
    public function validate($postData, &$errors):bool
    {
        $isValid = true;
        $counter = 1;
        if($postData["name"] == "")
        {
            $isValid = false;
            array_push($errors, "Name is missing!");
        }

        foreach ($postData["answers"] as $answers)
        {
            if($answers == "")
            {
                $isValid = false;
                array_push($errors, "Answer {$counter} is Missing!");
            }
            $counter++;
        }
        return $isValid;
    }
}
