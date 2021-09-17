<?php

namespace Controllers;

use Mappers\QuestionMapper;
use Model\InputTable;
use Operations\Delete;
use Operations\Filler;
use Operations\Update;
use Parsers\QuestionParser;
use Repositories\QuestionRepository;

class QuestionController extends BaseControlller
{
    public function indexAction()
    {
        $questionRepository = new QuestionRepository();
        $this->view("Index.php", ['questions' => $questionRepository->getAll($_GET["test_id"])]);
    }

    public function createAction()
    {
        $this->view("Create.php");
    }

    public function createActionPost()
    {
        $errors = [];
        $questionRepository = new QuestionRepository();
        $questionData = QuestionParser::parse($_POST, $_GET);
        $question = $questionRepository->insert($questionData, $errors);
        if(empty($errors)) $this->redirect("Question", "index","&test_id={$question->getTestId()}");
        $this->view("Create.php", $question, $errors);
    }

    public function updateAction()
    {
        $questionRepository = new QuestionRepository();

        $question = $questionRepository->getQuestion($_GET["question_id"]);

        $this->view("Update.php", ["question" => $question]);
    }

    public function updateActionPost()
    {

    }

    public function deleteAction()
    {
        $delete = new Delete();
        $delete->delete($_GET["questionId"]);
        header("Location: index.php?controller=Question&action=index&test_id={$_GET["test_id"]}");
        exit();
    }
}
