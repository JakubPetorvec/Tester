<?php

namespace SQLBuilders;
use Entities\Answer;

class AnswerSQLBuilder
{
    public function buildInsert(Answer $answer): string
    {
        return "INSERT INTO answers (questionId, answer, value) VALUES ('{$answer->getQuestionId()}', '{$answer->getAnswer()}','{$answer->getValue()}')";
    }

    public function buildGetAll(): string
    {
        return "SELECT * FROM answers";
    }

    public function buildGetRowById($rowId): string
    {
        return "SELECT * FROM answers WHERE id = {$rowId} ";
    }

    public function buildGetRowsByQuestionId($questionId): string
    {
        return "SELECT * FROM answers WHERE questionId = '{$questionId}'";
    }

    public function buildGetAnswersByQuestionId($questionId): string
    {
        return "SELECT answer FROM answers WHERE questionId = '{$questionId}'";
    }

    public function buildUpdate(Answer $answer): string
    {
        return "UPDATE answers SET answer = '{$answer->getAnswer()[0]}', value = '{$answer->getValue()}' WHERE id = '{$answer->getId()}'";
    }


    public function buildDelete(Answer $answer): string
    {
        return "DELETE FROM answers WHERE id = '{$answer->getId()}'";
    }
}