<?php

namespace Entities;

class Test extends BaseEntity
{
    private string $name = "";
    private string $percentage = "";

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
     * @return string
     */
    public function getPercentage(): string
    {
        return $this->percentage;
    }

    /**
     * @param string $percentage
     */
    public function setPercentage(string $percentage): void
    {
        $this->percentage = $percentage;
    }

}