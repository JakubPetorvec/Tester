<?php

namespace Repositories;

use DB\Connection;
use Entities\Answer;
use Mappers\AnswerMapper;
use Parsers\AnswerParser;
use SQLBuilders\AnswerSQLBuilder;

class AnswerRepository extends BaseRepository
{
    public static function getAllX(object $entity, array $selectors): array
    {
        foreach (BaseRepository::getAllBySelector($entity, $selectors) as $answer)
        {
            $data[] = AnswerMapper::map($answer);
        }
        return $data;
    }
    /*
    public function insert(Answer $answer): void
    {
        $this->connection->connect();
        $this->connection->insert($this->answerSqlBuilder->buildInsert($answer));
    }

    public function getRow(int $answerId): Answer
    {
        $this->connection->connect();
        return AnswerMapper::map($this->connection->getAll($this->answerSqlBuilder->buildGetRowById($answerId))[0]);
    }

    public function update(Answer $answer): void
    {
        $this->connection->connect();
        $this->connection->update($this->answerSqlBuilder->buildUpdate($answer));
    }

    public function delete(Answer $answer): void
    {
        $this->connection->connect();
        $this->connection->delete($this->answerSqlBuilder->buildDelete($answer));
    }*/
}
