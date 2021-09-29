<?php

namespace Mappers;

use Model\Evaluation;

class ExamMapper
{
    public static function map($row): Evaluation
    {
        $evaluation = new Evaluation();

        $evaluation->setId($row["id"]);
        $evaluation->setTestName($row["testName"]);
        $evaluation->setName($row["name"]);
        $evaluation->setStart($row["start"]);
        $evaluation->setFinish($row["finish"]);
        $evaluation->setNeededPercentage($row["neededPercentage"]);
        $evaluation->setPercentage($row["percentage"]);

        return $evaluation;
    }
}
