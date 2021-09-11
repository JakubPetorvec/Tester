<?php

namespace Operations;

use DB\Connection;
use SQLBuilders\AnswerSQLBuilder;
use SQLBuilders\QuestionSQLBuilder;

class Filler
{
    public function fill($rowId, $inputTable):bool
    {
        $connection = new Connection();

        if($connection->connect() === true)
        {
            $questionSQLBuilder = new QuestionSQLBuilder();
            $getQuestionRow = $questionSQLBuilder->buildGetRowById($rowId);

            $questionRow = $connection->getAll($getQuestionRow);
            if(!empty($questionRow))
            {
                $inputTable->setQuestionId((int)$questionRow[0]["id"]);
                $inputTable->setQuestion((string)$questionRow[0]["question"]);
                $inputTable->setQuestionType((int)$questionRow[0]["type"]);

                if($questionRow[0]["type"] == "1")
                {
                    $answersSQLBuilder = new AnswerSQLBuilder();
                    $getAnswerRows = $answersSQLBuilder->buildGetRowById($rowId);
                    $answerRows = $connection->getAll($getAnswerRows);

                    $inputTable->setRadioButton("checked");
                    $inputTable->setRadioText("");

                    $inputTable->setAnswerId0((int)$answerRows[0]["id"]);
                    $inputTable->setAnswerId1((int)$answerRows[1]["id"]);
                    $inputTable->setAnswerId2((int)$answerRows[2]["id"]);

                    $inputTable->setAnswer0((string)$answerRows[0]["answer"]);
                    $inputTable->setAnswer1((string)$answerRows[1]["answer"]);
                    $inputTable->setAnswer2((string)$answerRows[2]["answer"]);

                    $inputTable->setAnswerValue0((int)$answerRows[0]["value"]);
                    $inputTable->setAnswerValue1((int)$answerRows[1]["value"]);
                    $inputTable->setAnswerValue2((int)$answerRows[2]["value"]);

                    if($answerRows[0]["value"] == "1") $inputTable->setCheckBoxAnswer0("checked");
                    else $inputTable->setCheckBoxAnswer0("");

                    if($answerRows[1]["value"] == "1") $inputTable->setCheckBoxAnswer1("checked");
                    else $inputTable->setCheckBoxAnswer1("");

                    if($answerRows[2]["value"] == "1") $inputTable->setCheckBoxAnswer2("checked");
                    else $inputTable->setCheckBoxAnswer2("");


                }
                else
                {
                    $inputTable->setRadioText("checked");
                    $inputTable->setRadioButton("");
                }
            }
            return true;

        }
        echo "Error [No Data in Table!]";
        return false;



    }
}
