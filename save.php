<?php
include "Entities/question.php";
include "Entities/answer.php";
include "connection.php";
include "questionSQLBuilder.php";
include "questionMapper.php";
include "questionParser.php";
include "answerSQLBuilder.php";
include "answerMapper.php";
include "answerParser.php";
include "answerTypes.php";
include "dataValidation.php";


$connection = new Connection();
$areDataValidate = new DataValidation();

if ($connection->connect() === true && $areDataValidate->validateData($_POST) === true)
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
else
{
    echo '<script type="text/javascript">';
    echo ' alert("JavaScript Alert Box by PHP")';
    echo '</script>';
}

    /*
    $myQuestions = $connection->getAll($questionSqlBuilder->buildGetAll());
    foreach ($myQuestions as $myQuestion) { $question = QuestionMapper::map($myQuestion);}

    $myAnswers = $connection->getAll($answerSqlBuilder->buildGetAll());
    foreach ($myAnswers as $myAnswer) { $answer = AnswerMapper::map($myAnswer);}
    */

   /* header("Location: index.php", true, 301);
    exit();*/
}



