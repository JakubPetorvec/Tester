<?php

class AnswerMapper
{
    public static function map(array $row):Answer
    {
        $result = new Answer();
        $result->setId($row["id"]);
        $result->setQuestionId($row["question_id"]);
        $result->setAnswer($row["answer"]);
        $result->setValue($row["value"]);
        return $result;
    }
}