<?php

namespace Operations;

use DB\Connection;
use SQLBuilders\QuestionSQLBuilder;

class Delete
{
    public function delete($rowId):void
    {
        $connection = new Connection();

        if($connection->connect() === true)
        {
            $questionSQLBuilder = new QuestionSQLBuilder();
            $deleteQuestion = $questionSQLBuilder->buildDeleteRowById($rowId);

            $connection->delete($deleteQuestion);
        }
    }
}