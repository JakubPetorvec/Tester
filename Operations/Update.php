<?php

namespace Operations;

use DB\Connection;
use Parsers\AnswerParser;
use Parsers\QuestionParser;
use SQLBuilders\QuestionSQLBuilder;
use SQLBuilders\AnswerSQLBuilder;
use Validators\AnswerValidator;
use \AnswerTypes;

class Update
{
    public function update($rowId, array $answers, string $radioButton1):bool
    {
        $connection = new Connection();
        $isValid = new AnswerValidator();
        $myErrors = [];

        if($radioButton1 !== "checked") $isValid->validate($myErrors);

        if($connection->connect() === true && empty($myErrors))
        {
            $questionParser = new QuestionParser();
            $question = $questionParser->parse($_POST);

            $questionSqlBuilder = new QuestionSqlBuilder();
            $updateSql = $questionSqlBuilder->buildUpdate($question, $rowId);
            $connection->update($updateSql);
            if($radioButton1 !== "checked")
            {
                for($i = 0; $i < 3; $i++)
                {
                    $answerParser = new AnswerParser();
                    $answer = $answerParser->parse($_POST, $rowId, $i);

                    $answerSqlBuilder = new AnswerSQLBuilder();
                    $insertSql = $answerSqlBuilder->buildUpdate($answer, $rowId, $answers[$i]);
                    $connection->update($insertSql);
                }
            }
            header("Location: index.php?action=create");
            exit();
        }
        ?><table class="table-errors"><?php
        foreach ($myErrors as $error)
        {
            ?><tr><td><?php echo $error ?></td></tr><?php
        }
        ?></table><?php
        return false;
    }
}
