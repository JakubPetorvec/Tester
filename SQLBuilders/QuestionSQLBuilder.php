<?php

namespace SQLBuilders;
use Entities\Question;

class QuestionSQLBuilder
{
    public function buildInsert(Question $question): string
    {
        return "INSERT INTO questions (question, type) VALUES ('{$question->getQuestion()}', '{$question->getType()}')";
    }

    public function buildUpdate(Question $question, $rowId): string
    {
        return "UPDATE questions SET question = '{$question->getQuestion()}' WHERE id = '{$rowId}'";
    }

    public function buildGetAll(): string
    {
        return "SELECT * FROM questions";
    }

    public function buildGetRowById($rowId): string
    {
        return "SELECT * FROM questions WHERE id = {$rowId} ";
    }

    public function buildDeleteRowById($rowId): string
    {
        return "DELETE FROM questions WHERE id = '{$rowId}'";
    }
}
