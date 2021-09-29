<?php

namespace Repositories;

use DB\Connection;
use Model\Evaluation;
use Mappers\ExamMapper;
use Model\EvaluationModel;
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

    public function getAll(): array
    {
        $this->connection->connect();
        $data = $this->connection->getAll($this->evaluationSqlBuilder->buildGetAll());
        $evaluation = [];
        foreach ($data as $row) $evaluation[] = ExamMapper::map($row);
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

    public function insert(int $examId, int $percentage): void
    {
        $evaluation = new Evaluation();
        $this->connection->connect();

        $evaluation->setId($examId);
        $evaluation->setPercentage($percentage);

        $this->connection->insert($this->evaluationSqlBuilder->buildUpdate($evaluation));
    }

    public function update(EvaluationModel $evaluationModel): void
    {
        $this->connection->connect();
        $this->connection->update($this->evaluationSqlBuilder->buildUpdateAnswer($evaluationModel));
    }


}
