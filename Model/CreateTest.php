<?php

namespace Model;

class CreateTest
{
    private int $id = 0;
    private string $name = "";
    private string $percentage = "";

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
