<?php

namespace Operations;

use Parsers\InputTableParser;
use DB\Connection;
use Parsers\QuestionParser;
use SQLBuilders\QuestionSQLBuilder;
use SQLBuilders\AnswerSQLBuilder;

class Update
{
    public function update($rowId, $inputTable):bool
    {
        $connection = new Connection();
        $isValidate = new \DataValidation();

        if($connection->connect() === true && $isValidate->validateData($_POST, $myErrors) === true)
        {
            $questionParser = new QuestionParser();
            $question = $questionParser->parse($_POST);

            $questionSqlBuilder = new QuestionSqlBuilder();
            $insertSql = $questionSqlBuilder->buildUpdate($question, $rowId);
            print_r($insertSql);
            $questionId = $connection->update($insertSql);

        }

        return true;
    }
}
