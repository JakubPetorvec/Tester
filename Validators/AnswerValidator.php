<?php

namespace Validators;

class AnswerValidator
{
    public function validate(array &$errors):void
    {
        $counter = 0;
        for($i = 0; $i < 3; $i++) {
            if ($_POST["txtAns" . $i] === "") array_push($errors, "Answer $i is missing!");
            if(isset($_POST["check"][$i])){
                $counter++;
            }
        }
        if($counter === 0) array_push($errors, "No right answers");
    }
}