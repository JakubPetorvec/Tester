<?php

namespace Mappers;

use Model\EvaluationModel;
use Tools\ReflectionMapper;

class EvaluationMapper
{
    public static function map($row): EvaluationModel
    {
        return ReflectionMapper::map(new EvaluationModel(), $row);
    }
}
