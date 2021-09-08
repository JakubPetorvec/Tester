<?php

class AnswerParser
{
    public function parse(array $postData, int $questionId, int $answerId):Answer
    {
        $answer = new Answer();
        $answer->setQuestionId($questionId);
        $answer->setAnswer($this->generateAnswerArray($postData, $answerId));
        $answer->setValue($this->setValue($postData, $answerId));
        return $answer;
    }

    private function generateAnswerArray(array $postData,int $answerId):string
    {
        $answers = [0 => $postData["txtAns0"],
                    1 => $postData["txtAns1"],
                    2 => $postData["txtAns2"]];
        return $answers[$answerId];
    }

    private function setValue(array $postData, int $answerId):int
    {
        return isset($postData["check"][$answerId]) ? 1 : 0;
    }
}