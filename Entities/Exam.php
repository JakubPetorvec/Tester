<?php

namespace Entities;

class Exam extends BaseEntity
{
    private int $testId = 0;
    private string $name = "";
    private string $start = "";
    private string $finish = "";

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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

    /**
     * @return string
     */
    public function getStart(): string
    {
        return $this->start;
    }

    /**
     * @param string $start
     */
    public function setStart(string $start): void
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getFinish(): string
    {
        return $this->finish;
    }

    /**
     * @param string $finish
     */
    public function setFinish(string $finish): void
    {
        $this->finish = $finish;
    }
}
