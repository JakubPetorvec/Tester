<?php

namespace Controllers;

use DB\Connection;
use Model\CreateTest;
use Parsers\TestParser;
use Repositories\TestRepository;
use SQLBuilders\TestSQLBuilder;
use Validators\TestValidator;

class TestController extends BaseControlller
{
    public function indexAction()
    {
        $testRepository = new TestRepository();
        $this->view("Index.php", $testRepository->getAll());
    }

    public function createAction()
    {
        $errors = [];
        $createTest = new CreateTest();

        if(isset($_POST["sended"]))
        {
            $createTest->setTestName($_POST["testName"]);
            $createTest->setTestPercentage($_POST["testPercentage"]);

            $testValidator = new TestValidator();
            if($testValidator->validate($_POST, $errors))
            {
                $connection = new Connection();
                $connection->connect();

                $testParser = new TestParser();
                $testData = $testParser->parse($_POST);

                $testSqlBuilder = new TestSQLBuilder();
                $connection->insert($testSqlBuilder->buildInsert($testData));
                header("Location: index.php?controller=Test");
                exit();
            }
        }
        $this->view("Create.php", $createTest, $errors);
    }

    public function deleteAction()
    {
        $testSqlBuilder = new TestSQLBuilder();
        $connection = new Connection();

        $connection->connect();
        $connection->delete($testSqlBuilder->buildDelete($_GET["test_id"]));

        header("Location: index.php?controller=Test");
        exit();
    }
}