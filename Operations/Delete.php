<?php

namespace Operations;

use DB\Connection;
use SQLBuilders\QuestionSQLBuilder;

class Delete
{
    public function delete($rowId)
    {
        $connection = new Connection();

        if($connection->connect() === true)
        {
            $questionSQLBuilder = new QuestionSQLBuilder();
            $deleteQuestion = $questionSQLBuilder->buildDeleteRowById($rowId);

            return $connection->delete($deleteQuestion);
        }
    }
}