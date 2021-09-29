<?php

namespace Model;

class Evaluation extends BaseModel
{
    private int $testId = 0;
    private string $testName = "";
    private string $name = "";
    private string $start = "";
    private string $finish = "";
    private string $neededPercentage = "";
    private ?int $percentage = null;

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

    /**
     * @return int|null
     */
    public function getPercentage(): ?int
    {
        return $this->percentage;
    }

    /**
     * @param int|null $percentage
     */
    public function setPercentage(?int $percentage): void
    {
        $this->percentage = $percentage;
    }

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
    public function getNeededPercentage(): string
    {
        return $this->neededPercentage;
    }

    /**
     * @param string $neededPercentage
     */
    public function setNeededPercentage(string $neededPercentage): void
    {
        $this->neededPercentage = $neededPercentage;
    }

}
