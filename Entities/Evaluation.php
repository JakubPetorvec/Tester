<?php

namespace Entities;

use Model\BaseModel;

class Evaluation extends BaseEntity
{
    private int $examId = 0;
    private ?int $passed = null;

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
     * @return int|null
     */
    public function getPassed(): ?int
    {
        return $this->passed;
    }

    /**
     * @param int|null $passed
     */
    public function setPassed(?int $passed): void
    {
        $this->passed = $passed;
    }
}