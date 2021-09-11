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

    public function buildGetRowById($rowId): string
    {
        return "SELECT * FROM answers WHERE question_id = {$rowId} ";
    }

    public  function buildUpdate(Answer $answer, $rowId):string
    {
        return "UPDATE questions SET question = 'Testasd', `type` = '0' WHERE questions.id = {$rowId}";
    }
}