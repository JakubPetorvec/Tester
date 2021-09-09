<?php

class AnswerTypes
{
    public function isButtonType($postData):bool
    {
        return $postData["type"]=="button";
    }

}