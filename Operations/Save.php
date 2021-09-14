<?php

namespace Operations;

use \AnswerTypes;
use Validators\DataValidation;
use DB\Connection;
use Parsers\QuestionParser;
use SQLBuilders\QuestionSQLBuilder;
use Parsers\AnswerParser;
use SQLBuilders\AnswerSQLBuilder;

class Save
{
    public function save(array $postData):void
    {
        $connection = new Connection();
        $isValidate = new DataValidation();

        $myErrors = [];

        if ($connection->connect() === true && $isValidate->validateData($postData, $myErrors) === true)
        {
            $questionParser = new QuestionParser();
            $question = $questionParser->parse($_POST);

            $questionSqlBuilder = new QuestionSqlBuilder();
            $insertSql = $questionSqlBuilder->buildInsert($question);

            $questionId = $connection->insert($insertSql);

            $isButtonType = new AnswerTypes();
            if($isButtonType->isButtonType($_POST)){
                for($i = 0; $i <3; $i++)
                {
                    $answerParser = new AnswerParser();
                    $answer = $answerParser->parse($_POST, $questionId, $i);

                    $answerSqlBuilder = new AnswerSQLBuilder();
                    $insertSql = $answerSqlBuilder->buildInsert($answer);
                    $connection->insert($insertSql);
                }
            }
            header("Location: index.php?controller=Question");
            exit();
        }
        if (!empty($myErrors))
        {
            ?><table class="table-errors"><?php
            foreach ($myErrors as $error)
            {
                ?><tr><td><?php echo $error ?></td></tr><?php
            }
            ?></table><?php
        }
    }
}




