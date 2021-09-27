<?php

namespace Controllers;

use Entities\Exam;
use Entities\ExamAnswer;
use Entities\Question;
use Parsers\ExamAnswersParser;
use Parsers\ExamParser;
use Repositories\AnswerRepository;
use Repositories\ExamRepository;
use Repositories\ExamTestRepository;
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
            $exam = new Exam();

            $exam->setTestId($_GET["test_id"]);
            $exam->setName($_POST["name"]);
            $exam->setDate(date("d.m.Y H:i:s"));

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
            shuffle($groupedQuestions);

            $this->view("Exam.php", ["groupedQuestions" => $groupedQuestions, "examId" => $examId]);
        }
        else $this->view("Index.php", null, $errors);
    }

    public function saveActionPost()
    {
        $exam_id = $_POST["exam_id"];
        $test_id = $_POST["test_id"];

        $questionRepository = new QuestionRepository();
        $answers = ExamAnswersParser::parse($_POST);
        foreach ($answers as $questionId => $rawAnswer)
        {
            $question = $questionRepository->getById($questionId);

            if ($question instanceof Question)
            {
                $examAnswer = new ExamAnswer();
                $examAnswer->setExamId($exam_id);
                $examAnswer->setQuestionId($questionId);
                $examAnswer->setTestId($test_id);
                if ($question->getType() === "button") $examAnswer->setButtonAnswer($rawAnswer);
                else $examAnswer->setTextboxAnswer($rawAnswer);

                $examTestRepository = new ExamTestRepository();
                $examTestRepository->insertAnswer($examAnswer);
            }
        }
        header("Location: index.php");
        exit();
    }

}