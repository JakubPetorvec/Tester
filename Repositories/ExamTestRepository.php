<?php

namespace Repositories;

use DB\Connection;
use Entities\Exam;
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

    public function insert($data): void
    {
        $this->connection->connect();

        print_r($data);
        $counter = 0;
        foreach ($data["question"] as $question)
        {
            $this->connection->insert($this->examSqlBuilder->buildInsertTest($data["examId"], $question, $data["answers"][$counter]));
            $counter++;
        }
    }
}
