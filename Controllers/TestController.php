<?php

namespace Controllers;

use DB\Connection;
use SQLBuilders\TestSQLBuilder;

class TestController extends BaseControlller
{
    public function indexAction()
    {
        $connection = new Connection();
        $connection->connect();

        $test = new TestSQLBuilder();
        $test = $connection->getAll($test->buildGetAll());

        print_r($test);


        $this->view("Index.php", $test);
    }
}