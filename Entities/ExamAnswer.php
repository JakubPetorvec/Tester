<?php

namespace Entities;

class ExamAnswer extends BaseEntity
{
    private int $exam_id = 0;
    private int $test_id = 0;
    private int $question_id = 0;
    private ?int $buttonAnswer = null;
    private ?string $textboxAnswer = "";

    /**
     * @return int
     */
    public function getExamId(): int
    {
        return $this->exam_id;
    }

    /**
     * @param int $exam_id
     */
    public function setExamId(int $exam_id): void
    {
        $this->exam_id = $exam_id;
    }

    /**
     * @return int
     */
    public function getTestId(): int
    {
        return $this->test_id;
    }

    /**
     * @param int $test_id
     */
    public function setTestId(int $test_id): void
    {
        $this->test_id = $test_id;
    }

    /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->question_id;
    }

    /**
     * @param int $question_id
     */
    public function setQuestionId(int $question_id): void
    {
        $this->question_id = $question_id;
    }

    /**
     * @return int|null
     */
    public function getButtonAnswer(): ?int
    {
        return $this->buttonAnswer;
    }

    /**
     * @param int|null $buttonAnswer
     */
    public function setButtonAnswer(?int $buttonAnswer): void
    {
        $this->buttonAnswer = $buttonAnswer;
    }

    /**
     * @return string|null
     */
    public function getTextboxAnswer(): ?string
    {
        return $this->textboxAnswer;
    }

    /**
     * @param string|null $textboxAnswer
     */
    public function setTextboxAnswer(?string $textboxAnswer): void
    {
        $this->textboxAnswer = $textboxAnswer;
    }

}
