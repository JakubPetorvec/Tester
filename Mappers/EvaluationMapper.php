<?php

namespace Mappers;

use Model\EvaluationModel;

class EvaluationMapper
{
    public static function map($row): EvaluationModel
    {
        $evaluation = new EvaluationModel();

        $evaluation->setId($row["id"]);
        $evaluation->setQuestion($row["question"]);
        $evaluation->setType($row["type"]);
        $evaluation->setAnswer($row["answer"]);
        $evaluation->setValue($row["value"]);
        $evaluation->setTextboxAnswer($row["textboxAnswer"]);

        return $evaluation;
    }
}
