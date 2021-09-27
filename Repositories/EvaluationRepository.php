<?php

namespace Repositories;

use DB\Connection;
use Entities\Evaluation;
use Mappers\ExamMapper;
use SQLBuilders\EvaluationSQLBuilder;

class EvaluationRepository
{
    private object $connection;
    private object $evaluationSqlBuilder;

    function __construct()
    {
        $this->connection = new Connection();
        $this->evaluationSqlBuilder = new EvaluationSQLBuilder();
    }

    public function getAll(string $table, int $id = null): array
    {
        $this->connection->connect();
        $data = $this->connection->getAll($this->evaluationSqlBuilder->buildGetAll($table, $id));

        $evaluation = [];
        if($id != null) foreach ($data as $row) $evaluation[] = ExamMapper::map($row);
        else foreach ($data as $row) $evaluation[] = ExamMapper::map($row);
        return $evaluation;
    }

    public function getAllEvaluation(int $examId): array
    {
        $this->connection->connect();
        return $this->connection->getAll($this->evaluationSqlBuilder->buildGetAllEvaluation($examId));
    }

    public function getTable(string $table, int $id = null): array
    {
        $this->connection->connect();
        return $this->connection->getAll($this->evaluationSqlBuilder->buildGetAll($table, $id));
    }

    public function insert(int $examId, int $passed): void
    {
        $evaluation = new Evaluation();
        $this->connection->connect();

        $evaluation->setExamId($examId);
        $evaluation->setPassed($passed);

        $this->connection->insert($this->evaluationSqlBuilder->buildInsert($evaluation));
    }


}
