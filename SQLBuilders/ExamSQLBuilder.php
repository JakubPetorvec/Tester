<?php

namespace SQLBuilders;

use Entities\Exam;

class ExamSQLBuilder
{
    public function buildInsert(Exam $exam): string
    {
        return "INSERT INTO exams (name, date) VALUES ('{$exam->getName()}', '{$exam->getDate()}')";
    }

    public function buildInsertTest(int $exam_id, int $questionId, string $answer)
    {
        return "INSERT INTO exams_answers (exam_id, question_id, answer) VALUES ('{$exam_id}', '{$questionId}', '$answer')";
    }
}
