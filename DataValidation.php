<?php
class DataValidation
{
    public function validateData($postData, &$errors):bool
    {
        $answerType = new AnswerTypes();

        if($answerType->isButtonType($postData) === true)
        {
            $isValidate = true;

            if($this->isQuestionValidate($postData)){
                $isValidate = false;
                array_push($errors, "Question is Missing!");
            }

            for ($i = 0; $i < 3; $i++)
            {
                if($postData["txtAns".$i] == "")
                {
                    $isValidate = false;
                    array_push($errors, "Answer ".($i+1)." is Missing!");
                }
            }

            if(!isset($postData["check"]))
            {
                $isValidate = false;
                array_push($errors, "No right Answers!");
            }

            return $isValidate;
        }
        else
        {
            if($this->isQuestionValidate($postData))
            {
                array_push($errors, "Question is Missing!");
                return false;
            }
        }
        return true;
    }

    private function isQuestionValidate($postData):bool
    {
        if(!$postData["txtQuestion"] == "") return false;
        return true;
    }
}