<?php

namespace Entities;

class Question extends BaseEntity
{
    private int $id;
    private int $testId;
    private string $question;
    private int $type;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
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