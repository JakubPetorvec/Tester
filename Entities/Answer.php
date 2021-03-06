<?php

namespace Entities;

class Answer extends BaseEntity
{
    private int $testId = 0;
    private int $questionId = 0;
    private array $answer = [""];
    private string $value = "";

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
    public function getAnswer(): array
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer(array $answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return int
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
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