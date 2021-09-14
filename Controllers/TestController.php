<?php

namespace Controllers;

use Controllers\BaseControlller;
use DB\Connection;
use Mappers\QuestionMapper;
use SQLBuilders\AnswerSQLBuilder;
use SQLBuilders\QuestionSQLBuilder;

class TestController extends BaseControlller
{
    public function createAction()
    {
        $questionSqlBuilder = new QuestionSQLBuilder();
        $answerSqlBuilder = new AnswerSQLBuilder();

        $connection = new Connection();
        $connection->connect();
        $questionsData = $connection->getAll($questionSqlBuilder->buildGetAll());
        $questions = [];
        $answers = [];

        foreach ($questionsData as $question)
        {
            $questions[] = QuestionMapper::map($question);
            $answers[] = $connection->getAll($answerSqlBuilder->buildGetRowsByQuestionId($question["id"]));
        }
        $this->view("Index.php", ['questions' => $questions], null, $answers);
    }
}