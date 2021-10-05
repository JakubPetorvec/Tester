<?php

namespace Mappers;

use Model\Evaluation;
use Tools\ReflectionMapper;

class ExamMapper
{
    public static function map($row): Evaluation
    {
        return ReflectionMapper::map(new Evaluation(), $row);
    }
}
