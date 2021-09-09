<?php

namespace SQLBuilders;
use Entities\Question;

class QuestionSQLBuilder
{
    public function buildInsert(Question $question): string
    {
        return "INSERT INTO questions (question, type) VALUES ('{$question->getQuestion()}', '{$question->getType()}')";
    }

    public function buildUpdate(Question $question): string
    {
        return "UPDATE questions SET question = {$question->getQuestion()}, type = {$question->getType()} WHERE id = {$question->getId()}";
    }

    public function buildGetAll(): string
    {
        return "SELECT * FROM questions";
    }
}
