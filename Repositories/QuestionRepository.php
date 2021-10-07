<?php

namespace Repositories;

use Controllers\ExamController;
use DB\Connection;
use Entities\Question;
use Mappers\QuestionMapper;
use SQLBuilders\QuestionSQLBuilder;
use Validators\QuestionValidator;

class QuestionRepository extends BaseRepository
{
    public static function getAllX(object $entity, array $selectors) : array
    {
        foreach (BaseRepository::getAllBySelector($entity, $selectors) as $question) $data[] = QuestionMapper::map($question);
        return $data;
    }

    /*
    public static function getAllById($questionId): Question
    {
        $questionSqlBuilder = new QuestionSQLBuilder();
        return QuestionMapper::map($this->connection->getAll($questionSqlBuilder->buildGetRowById($questionId))[0]);
    }

    public static function insert(Question $question, &$errors): Question
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
    } */
}
