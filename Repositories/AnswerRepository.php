<?php

namespace Repositories;

use DB\Connection;

class AnswerRepository
{
    private object $connection;

    function __construct()
    {
        $this->connection = new Connection();
    }

    public function getQuestion($questionId)
    {

    }
}
