<?php

namespace SQLBuilders;


use Entities\Evaluation;

class EvaluationSQLBuilder
{
    public function buildGetAll(): string
    {
        return "SELECT exams.id, tests.name AS testName, exams.name, exams.start, exams.finish, tests.percentage AS neededPercentage, exams.percentage FROM exams LEFT JOIN tests ON exams.test_id = tests.id;";
    }

    public function buildGetAllEvaluation(int $examId): string
    {
        $query = "SELECT ea.id, questions.question, questions.type, answers.answer, answers.value, ea.textboxAnswer FROM exams_answers as ea LEFT JOIN questions ON ea.question_id = questions.id LEFT JOIN answers ON ea.buttonAnswer = answers.id WHERE exam_id = $examId";
        return $query;
    }

    public function buildUpdate(\Model\Evaluation $evaluation): string
    {
        return "UPDATE exams SET percentage = '{$evaluation->getPercentage()}' WHERE id = '{$evaluation->getId()}'";
    }


}
