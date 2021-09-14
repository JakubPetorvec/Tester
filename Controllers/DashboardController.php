<?php

namespace Controllers;

class DashboardController extends BaseControlller
{
    public function indexAction()
    {
        $this->view("Index.php");
    }
}
