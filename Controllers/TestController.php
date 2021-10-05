<?php

namespace Controllers;

use Entities\Test;
use Parsers\TestParser;
use Repositories\TestRepository;
use Tools\ReflectionMapper;

class TestController extends BaseControlller
{
    public function indexAction()
    {
        $testRepository = new TestRepository();

        foreach ($testRepository->getAll() as $row)
        {
            $model[] = ReflectionMapper::map(new Test(), $row);
        }
        $this->view("Index.php", $model);
    }

    public function createAction()
    {
        $this->view("Create.php", new Test());
    }

    public function createActionPost()
    {
        $errors = [];
        $testRepository = new TestRepository();
        $testData = TestParser::parse($_POST);
        $test = $testRepository->insert($testData, $errors);
        if(empty($errors)) $this->redirect("Test", "index");
        $this->view("Create.php", $test, $errors);
    }
    public function deleteAction()
    {
        $testRepository = new TestRepository();
        if($testRepository->delete($_GET))
            $this->redirect("Test", "index");
    }
}