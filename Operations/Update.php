<?php

namespace Operations;

use DB\Connection;
use SQLBuilders\QuestionSQLBuilder;

class Update
{
    public function update($postData):bool
    {
        $connection = new Connection();

        if($connection->connect() === true)
        {
            $questionSQLBuilder = new QuestionSQLBuilder();
            $questionSQLBuilder->
        }


        return true;
    }
}
