<?php

namespace Entities;

class Test extends BaseEntity
{
    private string $testName;
    private string $testPercentage;

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
}