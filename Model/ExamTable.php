<?php

namespace Model;

use Entities\BaseEntity;

class ExamTable
{
    private array $answersTextbox;
    private array $answersButton;
    private int $examId;
    private int $testId;

    /**
     * @return array
     */
    public function getAnswersTextbox(): array
    {
        return $this->answersTextbox;
    }

    /**
     * @param array $answersTextbox
     */
    public function setAnswersTextbox(array $answersTextbox): void
    {
        $this->answersTextbox = $answersTextbox;
    }

    /**
     * @return array
     */
    public function getAnswersButton(): array
    {
        return $this->answersButton;
    }

    /**
     * @param array $answersButton
     */
    public function setAnswersButton(array $answersButton): void
    {
        $this->answersButton = $answersButton;
    }

    /**
     * @return int
     */
    public function getExamId(): int
    {
        return $this->examId;
    }

    /**
     * @param int $examId
     */
    public function setExamId(int $examId): void
    {
        $this->examId = $examId;
    }

    /**
     * @return int
     */
    public function getTestId(): int
    {
        return $this->testId;
    }

    /**
     * @param int $testId
     */
    public function setTestId(int $testId): void
    {
        $this->testId = $testId;
    }

}
