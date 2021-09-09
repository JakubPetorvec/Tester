<?php

namespace Entities;

class InputTable
{
    private string $question;
    private string $answer0;
    private string $answer1;
    private string $answer2;
    private bool $radioButton;
    private bool $radioText;
    private bool $checkBoxAnswer0;
    private bool $checkBoxAnswer1;
    private bool $checkBoxAnswer2;

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
     * @return string
     */
    public function getAnswer0(): string
    {
        return $this->answer0;
    }

    /**
     * @param string $answer0
     */
    public function setAnswer0(string $answer0): void
    {
        $this->answer0 = $answer0;
    }

    /**
     * @return string
     */
    public function getAnswer1(): string
    {
        return $this->answer1;
    }

    /**
     * @param string $answer1
     */
    public function setAnswer1(string $answer1): void
    {
        $this->answer1 = $answer1;
    }

    /**
     * @return string
     */
    public function getAnswer2(): string
    {
        return $this->answer2;
    }

    /**
     * @param string $answer2
     */
    public function setAnswer2(string $answer2): void
    {
        $this->answer2 = $answer2;
    }

    /**
     * @return bool
     */
    public function isRadioButton(): bool
    {
        return $this->radioButton;
    }

    /**
     * @param bool $radioButton
     */
    public function setRadioButton(bool $radioButton): void
    {
        $this->radioButton = $radioButton;
    }

    /**
     * @return bool
     */
    public function isRadioText(): bool
    {
        return $this->radioText;
    }

    /**
     * @param bool $radioText
     */
    public function setRadioText(bool $radioText): void
    {
        $this->radioText = $radioText;
    }

    /**
     * @return bool
     */
    public function isCheckBoxAnswer0(): bool
    {
        return $this->checkBoxAnswer0;
    }

    /**
     * @param bool $checkBoxAnswer0
     */
    public function setCheckBoxAnswer0(bool $checkBoxAnswer0): void
    {
        $this->checkBoxAnswer0 = $checkBoxAnswer0;
    }

    /**
     * @return bool
     */
    public function isCheckBoxAnswer1(): bool
    {
        return $this->checkBoxAnswer1;
    }

    /**
     * @param bool $checkBoxAnswer1
     */
    public function setCheckBoxAnswer1(bool $checkBoxAnswer1): void
    {
        $this->checkBoxAnswer1 = $checkBoxAnswer1;
    }

    /**
     * @return bool
     */
    public function isCheckBoxAnswer2(): bool
    {
        return $this->checkBoxAnswer2;
    }

    /**
     * @param bool $checkBoxAnswer2
     */
    public function setCheckBoxAnswer2(bool $checkBoxAnswer2): void
    {
        $this->checkBoxAnswer2 = $checkBoxAnswer2;
    }


}
