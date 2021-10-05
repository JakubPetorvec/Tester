<?php

namespace SQLBuilders;
use Entities\Question;

class QuestionSQLBuilder
{
    public function buildInsert(Question $question): string
    {
        return "INSERT INTO questions (testId, question, type) VALUES ('{$question->getTestId()}', '{$question->getQuestion()}', '{$question->getType()}')";
    }

    public function buildUpdate(Question $question): string
    {
        return "UPDATE questions SET question = '{$question->getQuestion()}' WHERE id = '{$question->getId()}'";
    }

    public function buildGetAll(int $testId): string
    {
        return "SELECT * FROM questions WHERE testId = '{$testId}'";
    }

    public function buildGetRowById($rowId): string
    {
        return "SELECT * FROM questions WHERE id = {$rowId} ";
    }

    public function buildDelete(Question $question): string
    {
        return "DELETE FROM questions WHERE id = '{$question->getId()}'";
    }
}
