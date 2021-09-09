<?php

namespace SQLBuilders;
use Entities\Answer;

class AnswerSQLBuilder
{
    public function buildInsert(Answer $answer): string
    {
        return "INSERT INTO answers (question_id, answer, value) VALUES ('{$answer->getQuestionId()}', '{$answer->getAnswer()}','{$answer->getValue()}')";
    }

    public function buildGetAll(): string
    {
        return "SELECT * FROM answers";
    }
}