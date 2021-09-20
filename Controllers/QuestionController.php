<?php

namespace Controllers;

use Entities\Question;
use Mappers\QuestionMapper;
use Model\InputTable;
use Operations\Delete;
use Operations\Filler;
use Operations\Update;
use Parsers\QuestionParser;
use Repositories\AnswerRepository;
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
        $answerRepository = new AnswerRepository();

        $questionId = $_GET["question_id"];

        $question = $questionRepository->getQuestion($questionId);
        $answers = $answerRepository->getAll($questionId);

        $this->view("Update.php", ["question" => $question, "answers" => $answers]);
    }

    public function updateActionPost()
    {
        $errors = [];
        $questionRepository = new QuestionRepository();

        $question = QuestionParser::parse($_POST, $_GET);

        $questionRepository->update($question, $errors);

        $this->indexAction();

    }

    public function deleteAction()
    {
        $question = new Question();
        $question = QuestionParser::parse($_POST, $_GET);

        $questionRepository = new QuestionRepository();
        $questionRepository->delete($question);

        $this->indexAction();
    }
}
