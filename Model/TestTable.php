<?php

class TestTable
{
    private int $questionId;
    private string $question;
    private string $questionType;
    private string $answer;

    /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    /**
     * @param int $questionId
     */
    public function setQuestionId(int $questionId): void
    {
        $this->questionId = $questionId;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getQuestionType(): string
    {
        return $this->questionType;
    }

    /**
     * @param string $questionType
     */
    public function setQuestionType(string $questionType): void
    {
        $this->questionType = $questionType;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }
}
