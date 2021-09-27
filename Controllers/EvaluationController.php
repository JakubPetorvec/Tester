<?php

namespace Controllers;

use DB\Connection;
use Mappers\EvaluationMapper;
use Mappers\ExamMapper;
use Mappers\TestMapper;
use Parsers\EvaluationParser;
use Parsers\ExamParser;
use Repositories\EvaluationRepository;
use Repositories\TestRepository;
use SQLBuilders\AnswerSQLBuilder;

class EvaluationController extends BaseControlller
{
    private object $evaluationRepository;
    private object $testRepository;

    function __construct()
    {
        $this->evaluationRepository = new EvaluationRepository();
        $this->testRepository = new TestRepository();
    }

    public function indexAction()
    {
        $this->view("index.php", $this->evaluationRepository->getAll("exams"));
    }

    public function evaluateAction()
    {
        $model = [];
        $data = $this->evaluationRepository->getAllEvaluation($_GET["exam_id"]);

        foreach ($data as $row)
        {
            $model[] = EvaluationMapper::map($row);
        }

        $this->view("evaluation.php", $model, "gay");
    }

    public function evaluateActionPost()
    {
        $data = EvaluationParser::parse($_POST);
        $score = round(($data["rightAnswers"] / $data["testLenght"]) * 100);

        $exam = ExamMapper::map($this->evaluationRepository->getTable("exams", $_GET["exam_id"])[0]);
        $test = TestMapper::map($this->testRepository->getRow($exam->getTestId())[0]);

        $this->evaluationRepository->insert($_GET["exam_id"], $score >= $test->getPercentage() ? 1 : 0);

        $this->view("final.php", ["score" => $score, "test" => $test]);
    }
}
