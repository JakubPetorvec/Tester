<?php

namespace Validators;

use Entities\Test;

class TestValidator
{
    public function validate(Test $testData, array &$error) : bool
    {
        $isValid = true;

        if($testData->getName() === ""){
            $isValid = false;
            array_push($error, "Missing test name!");
        }
        if($testData->getPercentage() === "")
        {
            $isValid = false;
            array_push($error, "Missing test percentage!");

        }
        if ((int)$testData->getPercentage() == 0)
        {
            $isValid = false;
            array_push($error, "Test percentage has to be in range <1% - 100%>!");
        }
        return $isValid;
    }
}
