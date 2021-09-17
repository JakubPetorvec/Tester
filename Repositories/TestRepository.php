<?php

namespace Repositories;

use DB\Connection;
use Entities\Test;
use Mappers\TestMapper;
use SQLBuilders\TestSQLBuilder;
use Validators\TestValidator;

class TestRepository
{
    public function getAll() : array
    {
        $connection = new Connection();
        $connection->connect();

        $testSqlBuilder = new TestSQLBuilder();
        $datas = $connection->getAll($testSqlBuilder->buildGetAll());

        $test = [];

        foreach ($datas as $data)
        {
            $test[] = TestMapper::map($data);
        }
        return $test;
    }

    public function insert($testData, &$errors) :Test
    {
        $test = new Test();

        $test->setName($testData->getName());
        $test->setPercentage($testData->getPercentage());

        $testValidator = new TestValidator();

        if ($testValidator->validate($testData, $errors))
        {
            $connection = new Connection();
            $connection->connect();

            $testSqlBuilder = new TestSQLBuilder();
            $connection->insert($testSqlBuilder->buildInsert($testData));
        }
        return $test;
    }

    public function delete($getData) : bool
    {
        $connection = new Connection();
        $connection->connect();

        if (isset($getData["test_id"]))
        {
            $testSqlBuilder = new TestSQLBuilder();
            $connection->delete($testSqlBuilder->buildDelete($getData["test_id"]));
            return true;
        }
        return false;
    }
}
