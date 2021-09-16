<?php

namespace Controllers;

use DB\Connection;
use Mappers\QuestionMapper;
use SQLBuilders\AnswerSQLBuilder;
use SQLBuilders\QuestionSQLBuilder;
use Validators\ExamValidator;

class ExamController extends BaseControlller
{
    public array $errors = [];
    public function indexAction()
    {
        $questionSqlBuilder = new QuestionSQLBuilder();
        $answerSqlBuilder = new AnswerSQLBuilder();

        $connection = new Connection();
        $connection->connect();
        $questionsData = $connection->getAll($questionSqlBuilder->buildGetAll($_GET["test_id"]));
        $questions = [];
        $answers = [];

        foreach ($questionsData as $question)
        {
            $questions[] = QuestionMapper::map($question);
            $answers[] = $connection->getAll($answerSqlBuilder->buildGetAnswersByQuestionId($question["id"]));
        }

        if(isset($_GET["valid"])){
            if($this->validateAnswers($_POST)){
                header("Location: index.php?controller=Exam&action=sended&test_id={$_GET["test_id"]}");
                exit();
            }
        }

        $this->view("Index.php", ['questions' => $questions], $this->errors, $answers);
    }

    private function validateAnswers($postData):bool
    {
        $testValidation = new ExamValidator();
        if(!$testValidation->validate($postData, $this->errors)){
            return false;
        }
        return true;
    }
}