<?php

namespace Repositories;

use DB\Connection;
use Entities\Exam;
use SQLBuilders\ExamSQLBuilder;

class ExamRepository
{
    private object $connection;

    function __construct()
    {
        $this->connection = new Connection();
    }

    public function insert(Exam $exam): int
    {
        $examSqlBuilder = new ExamSQLBuilder();

        $this->connection->connect();
        return $this->connection->insert($examSqlBuilder->buildInsert($exam));
    }
}