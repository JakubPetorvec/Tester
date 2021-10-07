<?php

namespace Controllers;

use Entities\Answer;
use Entities\Question;
use Parsers\QuestionParser;
use Repositories\AnswerRepository;
use Repositories\QuestionRepository;

class QuestionController extends BaseControlller
{
    public function indexAction()
    {
        $this->view("Index.php", ['questions' => QuestionRepository::getAllX(new Question(), ["testId" => $_GET["testId"]])]);
    }

    public function createAction()
    {
        $this->view("Create.php");
    }

    public function createActionPost()
    {
        $questionRepository = new QuestionRepository();
        $questionData = QuestionParser::parse($_POST, $_GET);
        $question = $questionRepository->insert($questionData);
        if(empty($errors)) $this->redirect("Question", "index","&testId={$_GET["testId"]}");
        $this->view("Create.php", $question);
    }

    public function updateAction()
    {
        $question = QuestionRepository::getAllX(new Question(), ["id" => $_GET["questionId"]]);
        $answers = AnswerRepository::getAllX(new Answer(), ["questionId" => $_GET["questionId"]]);

        $this->view("Update.php", ["question" => $question, "answers" => $answers]);
    }

    public function updateActionPost()
    {
        QuestionRepository::update(QuestionParser::map(new Question(), $_POST), $_GET["questionId"], ["question"]);
        $this->indexAction();
    }

    public function deleteAction()
    {
        $questionRepository = new QuestionRepository();
        $questionRepository->delete(new Question(), $_GET["questionId"]);

        $this->indexAction();
    }
}
