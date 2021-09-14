<?php

namespace Operations;

use DB\Connection;
use Parsers\AnswerParser;
use Parsers\QuestionParser;
use SQLBuilders\QuestionSQLBuilder;
use SQLBuilders\AnswerSQLBuilder;
use Validators\AnswerValidator;

class Update
{
    public function update(array $postData, $rowId, array $answers):bool
    {
        $connection = new Connection();

        if($connection->connect() === true)
        {
            $questionParser = new QuestionParser();
            $question = $questionParser->parse($postData);

            $questionSqlBuilder = new QuestionSqlBuilder();
            $updateSql = $questionSqlBuilder->buildUpdate($question, $rowId);
            $connection->update($updateSql);
            for($i = 0; $i < 3; $i++)
            {
                $answerParser = new AnswerParser();
                $answer = $answerParser->parse($postData, $rowId, $i);

                $answerSqlBuilder = new AnswerSQLBuilder();
                $insertSql = $answerSqlBuilder->buildUpdate($answer, $rowId, $answers[$i]);
                $connection->update($insertSql);
            }
        }
        return true;
    }
}
