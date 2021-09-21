<?php

namespace Controllers;

use Entities\Exam;
use mysqli;
use Operations\Shuffle2Arrays;
use Parsers\ExamParser;
use Repositories\AnswerRepository;
use Repositories\ExamRepository;
use Repositories\ExamTestRepository;
use Repositories\QuestionRepository;
use SQLBuilders\ExamSQLBuilder;
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

    //split actions
    //remake ExamValidators
    //add test id to exam database
    //repair insetring date time into database
    public function indexActionPost()
    {
        $errors = [];
        print_r($_POST);
        if(ExamValidator::validate($_POST, $errors))
        {
            $exam = new Exam();
            if(isset($_POST["name"])) $exam->setName($_POST["name"]);
            $exam->setDate(date('Y-m-d H:i:s'));

            $examRepository = new ExamRepository();
            $examId = $examRepository->insert($exam);

            $testId = $_GET["test_id"];
            $questions = $this->questionRepository->getAll($testId);
            $groupedQuestions = [];
            foreach ($questions as $question)
            {
                $groupedQuestion = new \stdClass();

                $groupedQuestion->question = $question;
                $answers = $this->answerRepository->getAll($question->getId());
                shuffle($answers);
                $groupedQuestion->answers = $answers;
                array_push($groupedQuestions, $groupedQuestion);
            }

            if(isset($_POST["sendedExam"]))
            {
                $examTestRepository = new ExamTestRepository();
                $examTestRepository->insert(ExamParser::parse($_POST, $examId));
            }

            shuffle($groupedQuestions);

            $this->view("Exam.php", $groupedQuestions);
        }
        else $this->view("Index.php", null, $errors);
    }

}