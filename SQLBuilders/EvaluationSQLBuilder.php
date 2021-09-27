<?php

namespace SQLBuilders;

class EvaluationSQLBuilder
{
    public function buildGetAll(string $table, int $id = null): string
    {
        if($id != null) return "SELECT * FROM $table WHERE id = $id";
        return "SELECT * FROM $table";
    }

    public function buildGetAllEvaluation(int $examId): string
    {
        $query = "SELECT ea.id, questions.question, questions.type, answers.answer, answers.value, ea.textboxAnswer FROM exams_answers as ea LEFT JOIN questions ON ea.question_id = questions.id LEFT JOIN answers ON ea.buttonAnswer = answers.id WHERE exam_id = $examId";
        return $query;
    }


}
