<?php

namespace Controllers;

use Repositories\AnswerRepository;
use Repositories\QuestionRepository;
use Validators\ExamValidator;

class ExamController extends BaseControlller
{
    private object $questionRepository;
    private object $answerRepository;

    function __construct()
    {
        $this->questionRepository = new QuestionRepository();
        $this->answerRepository = new AnswerRepository();
    }

    public function indexAction()
    {
        $this->view("Index.php");
    }

    public function indexActionPost()
    {
        $errors = [];
        if(ExamValidator::validate($_POST, $errors))
        {
            $testId = $_GET["test_id"];
            $questions = $this->questionRepository->getAll($testId);
            foreach ($questions as $question)
            {
                $answers[] = $this->answerRepository->getAll($question->getId());
            }
            $this->view("Exam.php", ["questions" => $questions, "answers" => $answers, "name" => $_POST["name"]]);
        }
        else $this->view("Index.php", null, $errors);
    }

}