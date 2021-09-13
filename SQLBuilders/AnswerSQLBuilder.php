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

    public function buildGetRowsByQuestionId($questionId): string
    {
        return "SELECT * FROM answers WHERE question_id = '{$questionId}'";
    }

    public  function buildUpdate(Answer $answer, int $rowId, string $previousAnswer):string
    {
        return "UPDATE answers SET answer = '{$answer->getAnswer()}', value = '{$answer->getValue()}' WHERE question_id = '{$rowId}' AND answer LIKE '{$previousAnswer}'";
    }
}