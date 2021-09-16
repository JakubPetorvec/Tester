<?php

namespace Validators;

class TestValidator
{
    public function validate($postData, array &$error) : bool
    {
        $isValid = true;

        if($postData["testName"] === ""){
            $isValid = false;
            array_push($error, "Missing test name!");
        }
        if($postData["testPercentage"] === "")
        {
            $isValid = false;
            array_push($error, "Missing test percentage!");

        }
        else if (intval($postData["testPercentage"]) == "0")
        {
            $isValid = false;
            array_push($error, "Test percentage has to be in range <1% - 100%>!");
        }
        return $isValid;
    }
}
