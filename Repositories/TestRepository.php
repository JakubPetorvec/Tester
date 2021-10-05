<?php

namespace Repositories;

use DB\Connection;
use Entities\ExamAnswer;
use Entities\Test;
use SQLBuilders\TestSQLBuilder;
use Tools\QueryBuilder\QueryBuilder;
use Tools\ReflectionSqlBuilder;
use Validators\TestValidator;

class TestRepository
{
    private \PDO $pdo;

    function __construct()
    {
        $this->pdo = new \PDO("mysql:host=localhost;dbname=tester;","root","");
    }

    public function getAll() : array
    {
        $rSqlBuilder = new ReflectionSqlBuilder(new ExamAnswer());

        print_r($rSqlBuilder->buildGetAll(249));
        echo "<br>";
        print_r($rSqlBuilder->buildGetAllBySelector(["questionId" => 650, "examId" => 44]));
        echo "<br>";
        print_r($rSqlBuilder->buildInsert(["ajaj", "gg", 99, 1]));
        echo "<br>";
        print_r($rSqlBuilder->buildUpdate("450", ["questionId" => 323, "examId" => 23]));
        echo "<br>";
        print_r($rSqlBuilder->buildDelete("78"));
        echo "<br>";
        $rSqlBuilder->prepareDeleteAll();
        print_r($rSqlBuilder->buildDelete());




        $query = (new QueryBuilder())
            ->select('id', 'name', 'percentage')
            ->where()
            ->from('tests');


        $pdoStatement = $this->pdo->prepare($query);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getRow(int $id): array
    {
        $connection = new Connection();
        $connection->connect();

        $testSqlBuilder = new TestSQLBuilder();

        return $connection->getAll($testSqlBuilder->buildGetAll($id));
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
