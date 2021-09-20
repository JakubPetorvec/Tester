<?php

namespace Controllers;

use Entities\Answer;
use Mappers\AnswerMapper;
use Parsers\AnswerParser;
use Repositories\AnswerRepository;
use Validators\AnswerValidator;

class AnswerController extends BaseControlller
{
    public function createAction()
    {
        $this->view("Create.php");
    }

    public function createActionPost()
    {
        $error = [];
        $answer = AnswerParser::parse($_POST, $_GET);
        if(AnswerValidator::validate($answer, $error))
        {
            $answerRepository = new AnswerRepository();
            $answerRepository->insert($answer);
            $testId = $answer->getTestId();
            $questionId = $answer->getQuestionId();
            header("Location: Index.php?controller=Question&action=update&test_id={$testId}&question_id={$questionId}");
            exit();
        }
        $this->view("Create.php", $answer, $error);
    }

    public function updateAction()
    {
        $answerRepository = new AnswerRepository();
        $answer = $answerRepository->getRow($_GET["answer_id"]);
        $this->view("Update.php", $answer);
    }

    public function updateActionPost()
    {
        $errors = [];
        $answer = AnswerParser::parse($_POST, $_GET);

        if(AnswerValidator::validate($answer, $errors))
        {
            $answerRepository = new AnswerRepository();
            $answerRepository->update($answer);
            header("Location: Index.php?controller=Question&action=update&test_id={$answer->getTestId()}&question_id={$answer->getQuestionId()}");
            exit();
        }
        $this->view("Update.php", $answer, $errors);


    }

    public function deleteAction()
    {
        $answerRepository = new AnswerRepository();
        $answer = new Answer();
        $answer->setId($_GET["answer_id"]);
        $answerRepository->delete($answer);

        $testId = $_GET["test_id"];
        $questionId = $_GET["question_id"];
        header("Location: Index.php?controller=Question&action=update&test_id={$testId}&question_id={$questionId}");
        exit();
    }
}
