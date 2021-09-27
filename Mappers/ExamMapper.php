<?php

namespace Mappers;

use Model\Evaluation;

class ExamMapper
{
    public static function map($row): Evaluation
    {
        $evaluation = new Evaluation();

        $evaluation->setId($row["id"]);
        $evaluation->setTestId($row["test_id"]);
        $evaluation->setName($row["name"]);
        $evaluation->setDate($row["date"]);

        return $evaluation;
    }
}
