<?php

namespace SQLBuilders;

use Entities\Exam;
use Entities\ExamAnswer;

class ExamSQLBuilder
{
    public function buildInsert(Exam $exam): string
    {
        return "INSERT INTO exams (test_id, name, start, finish) VALUES ('{$exam->getTestId()}', '{$exam->getName()}', '{$exam->getStart()}', '{$exam->getFinish()}')";
    }

    public function buildInsertAnswer(ExamAnswer $examAnswer)
    {
        $buttonAnswer = $examAnswer->getButtonAnswer() ?? "null";
        return "INSERT INTO exams_answers (exam_id, test_id ,question_id, buttonAnswer, textboxAnswer) VALUES ('{$examAnswer->getExamId()}', '{$examAnswer->getTestId()}', '{$examAnswer->getQuestionId()}',$buttonAnswer,'{$examAnswer->getTextboxAnswer()}')";
    }

    public function buildUpdate(Exam $exam): string
    {
        return "UPDATE exams SET finish = '{$exam->getFinish()}' WHERE id = '{$exam->getId()}'";
    }
}
