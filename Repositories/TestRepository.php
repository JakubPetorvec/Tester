<?php

namespace Repositories;

use DB\Connection;
use Mappers\TestMapper;
use SQLBuilders\TestSQLBuilder;

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
}
