<?php

namespace Repositories;

use DB\Connection;
use Entities\ExamAnswer;
use Model\ExamTable;
use SQLBuilders\ExamSQLBuilder;

class ExamTestRepository
{
    private object $connection;
    private object $examSqlBuilder;

    function __construct()
    {
        $this->connection = new Connection();
        $this->examSqlBuilder = new ExamSQLBuilder();
    }

    public function insertAnswer(ExamAnswer $examAnswer): void
    {
        $this->connection->connect();
        $this->connection->insert($this->examSqlBuilder->buildInsertAnswer($examAnswer));
    }
}
