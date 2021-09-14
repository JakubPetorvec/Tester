<?php

namespace Validators;

class AnswerValidator
{
    public function validate(array $postData, &$errors):bool
    {
        $counter = 0;
        for($i = 0; $i < 3; $i++) {
            if ($postData["txtAns" . $i] === "") array_push($errors, "Answer $i is missing!");
            if(isset($postData["check"][$i])){
                $counter++;
            }
        }
        if($counter === 0) array_push($errors, "No right answers");
        else if($counter > 1) array_push($errors, "Only one answer can be Right!");

        return empty($errors);
    }
}