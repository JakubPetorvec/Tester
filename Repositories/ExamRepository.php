<?php

namespace Repositories;

use DB\Connection;
use Entities\Exam;
use SQLBuilders\ExamSQLBuilder;

class ExamRepository
{
    private object $connection;
    private object $examSqlBuilder;

    function __construct()
    {
        $this->connection = new Connection();
        $this->examSqlBuilder = new ExamSQLBuilder();
    }

    public function insert(Exam $exam): int
    {
        $this->connection->connect();
        return $this->connection->insert($this->examSqlBuilder->buildInsert($exam));
    }

    public function update(Exam $exam): void
    {
        $this->connection->connect();
        $this->connection->update($this->examSqlBuilder->buildUpdate($exam));
    }
}