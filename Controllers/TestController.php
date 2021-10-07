<?php

namespace Controllers;

use Entities\Test;
use Parsers\TestParser;
use Repositories\BaseRepository;
use Tools\ReflectionMapper;

class TestController extends BaseControlller
{
    public function indexAction()
    {
        foreach (BaseRepository::getAll(new Test()) as $row) $model[] = ReflectionMapper::map(new Test(), $row);
        $this->view("Index.php", $model);
    }

    public function createAction()
    {
        $this->view("Create.php", new Test());
    }

    public function createActionPost()
    {
        BaseRepository::insert(TestParser::parse($_POST));
        if(empty($errors)) $this->redirect("Test", "index");
        $this->view("Create.php", TestParser::parse($_POST), $errors);
    }
    public function deleteAction()
    {
        BaseRepository::delete(new Test(), $_GET["testId"]);
        $this->redirect("Test", "index");
    }
}