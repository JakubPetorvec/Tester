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

$connection = new Connection();

if ($connection->connect() === true)
{
    $questionParser = new QuestionParser();
    $question = $questionParser->parse($_POST);

    $questionSqlBuilder = new QuestionSqlBuilder();
    $insertSql = $questionSqlBuilder->buildInsert($question);

    $questionId = $connection->insert($insertSql);
    for($i = 0; $i <3; $i++)
    {
        $answerParser = new AnswerParser();
        $answer = $answerParser->parse($_POST, $questionId, $i);

        $answerSqlBuilder = new AnswerSQLBuilder();
        $insertSql = $answerSqlBuilder->buildInsert($answer);
        $connection->insert($insertSql);
    }

    /*
    $myQuestions = $connection->getAll($questionSqlBuilder->buildGetAll());
    foreach ($myQuestions as $myQuestion) { $question = QuestionMapper::map($myQuestion);}

    $myAnswers = $connection->getAll($answerSqlBuilder->buildGetAll());
    foreach ($myAnswers as $myAnswer) { $answer = AnswerMapper::map($myAnswer);}
    */

    header("Location: index.php", true, 301);
    exit();
}



