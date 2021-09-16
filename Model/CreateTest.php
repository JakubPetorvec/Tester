<?php

namespace Model;

class CreateTest
{
    private int $testId = 0;
    private string $testName = "";
    private string $testPercentage = "";

    /**
     * @return string
     */
    public function getTestName(): string
    {
        return $this->testName;
    }

    /**
     * @param string $testName
     */
    public function setTestName(string $testName): void
    {
        $this->testName = $testName;
    }

    /**
     * @return string
     */
    public function getTestPercentage(): string
    {
        return $this->testPercentage;
    }

    /**
     * @param string $testPercentage
     */
    public function setTestPercentage(string $testPercentage): void
    {
        $this->testPercentage = $testPercentage;
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
