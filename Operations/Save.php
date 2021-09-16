<?php

namespace Operations;

use \AnswerTypes;
use DB\Connection;
use Parsers\QuestionParser;
use SQLBuilders\QuestionSQLBuilder;
use Parsers\AnswerParser;
use SQLBuilders\AnswerSQLBuilder;

class Save
{
    public function save(array $postData, array $getData):void
    {
        $connection = new Connection();

        if ($connection->connect() === true)
        {
            $questionParser = new QuestionParser();
            $question = $questionParser->parse($postData);

            $questionSqlBuilder = new QuestionSqlBuilder();
            $insertSql = $questionSqlBuilder->buildInsert($question, $getData["test_id"]);

            $questionId = $connection->insert($insertSql);

            $isButtonType = new AnswerTypes();
            if($isButtonType->isButtonType($postData)){
                for($i = 0; $i <3; $i++)
                {
                    $answerParser = new AnswerParser();
                    $answer = $answerParser->parse($postData, $questionId, $i);

                    $answerSqlBuilder = new AnswerSQLBuilder();
                    $insertSql = $answerSqlBuilder->buildInsert($answer);
                    $connection->insert($insertSql);
                }
            }
        }
    }
}




