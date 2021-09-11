<?php

namespace Entities;

class InputTable
{
    private int $questionId = 0;
    private int $answerId0 = 0;
    private int $answerId1 = 0;
    private int $answerId2 = 0;
    private int $questionType = 0;
    private int $answerValue0 = 0;
    private int $answerValue1 = 0;
    private int $answerValue2 = 0;
    private string $question = "";
    private string $answer0 = "";
    private string $answer1 = "";
    private string $answer2 = "";
    private string $radioButton = "";
    private string $radioText = "";
    private string $checkBoxAnswer0 = "";
    private string $checkBoxAnswer1 = "";
    private string $checkBoxAnswer2 = "";

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
     * @return string
     */
    public function getRadioButton(): string
    {
        return $this->radioButton;
    }

    /**
     * @param string $radioButton
     */
    public function setRadioButton(string $radioButton): void
    {
        $this->radioButton = $radioButton;
    }

    /**
     * @return string
     */
    public function getRadioText(): string
    {
        return $this->radioText;
    }

    /**
     * @param string $radioText
     */
    public function setRadioText(string $radioText): void
    {
        $this->radioText = $radioText;
    }

    /**
     * @return string
     */
    public function getCheckBoxAnswer0(): string
    {
        return $this->checkBoxAnswer0;
    }

    /**
     * @param string $checkBoxAnswer0
     */
    public function setCheckBoxAnswer0(string $checkBoxAnswer0): void
    {
        $this->checkBoxAnswer0 = $checkBoxAnswer0;
    }

    /**
     * @return string
     */
    public function getCheckBoxAnswer1(): string
    {
        return $this->checkBoxAnswer1;
    }

    /**
     * @param string $checkBoxAnswer1
     */
    public function setCheckBoxAnswer1(string $checkBoxAnswer1): void
    {
        $this->checkBoxAnswer1 = $checkBoxAnswer1;
    }

    /**
     * @return string
     */
    public function getCheckBoxAnswer2(): string
    {
        return $this->checkBoxAnswer2;
    }

    /**
     * @param string $checkBoxAnswer2
     */
    public function setCheckBoxAnswer2(string $checkBoxAnswer2): void
    {
        $this->checkBoxAnswer2 = $checkBoxAnswer2;
    }

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
     * @return int
     */
    public function getAnswerId0(): int
    {
        return $this->answerId0;
    }

    /**
     * @param int $answerId0
     */
    public function setAnswerId0(int $answerId0): void
    {
        $this->answerId0 = $answerId0;
    }

    /**
     * @return int
     */
    public function getAnswerId1(): int
    {
        return $this->answerId1;
    }

    /**
     * @param int $answerId1
     */
    public function setAnswerId1(int $answerId1): void
    {
        $this->answerId1 = $answerId1;
    }

    /**
     * @return int
     */
    public function getAnswerId2(): int
    {
        return $this->answerId2;
    }

    /**
     * @param int $answerId2
     */
    public function setAnswerId2(int $answerId2): void
    {
        $this->answerId2 = $answerId2;
    }

    /**
     * @return int
     */
    public function getQuestionType(): int
    {
        return $this->questionType;
    }

    /**
     * @param int $questionType
     */
    public function setQuestionType(int $questionType): void
    {
        $this->questionType = $questionType;
    }

    /**
     * @return int
     */
    public function getAnswerValue0(): int
    {
        return $this->answerValue0;
    }

    /**
     * @param int $answerValue0
     */
    public function setAnswerValue0(int $answerValue0): void
    {
        $this->answerValue0 = $answerValue0;
    }

    /**
     * @return int
     */
    public function getAnswerValue1(): int
    {
        return $this->answerValue1;
    }

    /**
     * @param int $answerValue1
     */
    public function setAnswerValue1(int $answerValue1): void
    {
        $this->answerValue1 = $answerValue1;
    }

    /**
     * @return int
     */
    public function getAnswerValue2(): int
    {
        return $this->answerValue2;
    }

    /**
     * @param int $answerValue2
     */
    public function setAnswerValue2(int $answerValue2): void
    {
        $this->answerValue2 = $answerValue2;
    }
}
