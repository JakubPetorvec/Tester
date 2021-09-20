<?php

namespace Repositories;

use Controllers\ExamController;
use DB\Connection;
use Entities\Question;
use Mappers\QuestionMapper;
use SQLBuilders\QuestionSQLBuilder;
use Validators\QuestionValidator;

class QuestionRepository
{
    private object $connection;

    function __construct()
    {
        $this->connection = new Connection();
    }

    public function getAll($testId) : array
    {
        $this->connection->connect();

        $questionSqlBuilder = new QuestionSQLBuilder();

        $questions = $this->connection->getAll($questionSqlBuilder->buildGetAll($testId));
        $data = [];

        foreach ($questions as $question)
            $data[] = QuestionMapper::map($question);

        return $data;
    }

    public function getQuestion($questionId): Question
    {
        $question = new Question();
        $questionSqlBuilder = new QuestionSQLBuilder();
        $this->connection->connect();
        return QuestionMapper::map($this->connection->getAll($questionSqlBuilder->buildGetRowById($questionId))[0]);
    }

    public function insert(Question $question, &$errors): Question
    {
        if(QuestionValidator::validate($question, $errors))
        {
            $this->connection->connect();
            $questionSqlBuilder = new QuestionSQLBuilder();
            $this->connection->insert($questionSqlBuilder->buildInsert($question));
        }
        return $question;
    }

    public function update(Question $question, &$errors): Question
    {
        if(QuestionValidator::validate($question, $errors))
        {
            $this->connection->connect();
            $questionSqlBuilder = new QuestionSQLBuilder();
            $this->connection->update($questionSqlBuilder->buildUpdate($question));
        }

        return $question;
    }

    public function delete(Question $question): void
    {
        $questionSqlBuilder = new QuestionSQLBuilder();
        $this->connection->connect();
        $this->connection->delete($questionSqlBuilder->buildDelete($question));
    }
}
