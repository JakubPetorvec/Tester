<?php

namespace SQLBuilders;

use Entities\Test;

class TestSQLBuilder
{
    public function buildGetAll(int $id = null) :string
    {
        if($id != null) return "SELECT * FROM tests WHERE id = $id";
        return "SELECT * FROM tests";
    }

    public function buildInsert(Test $test) :string
    {
        return "INSERT INTO tests (name, percentage) VALUES ('{$test->getName()}', '{$test->getPercentage()}')";
    }

    public function buildDelete($testId) :string
    {
        return "DELETE FROM tests WHERE id = '{$testId}'";
    }
}
