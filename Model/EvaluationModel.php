<?php

namespace Model;

class EvaluationModel extends BaseModel
{
    private string $question = "";
    private string $type = "";
    private ?string $answer = null;
    private ?string $value = null;
    private ?string $textboxAnswer = null;

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    /**
     * @param string|null $answer
     */
    public function setAnswer(?string $answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     */
    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getTextboxAnswer(): ?string
    {
        return $this->textboxAnswer;
    }

    /**
     * @param string|null $textboxAnswer
     */
    public function setTextboxAnswer(?string $textboxAnswer): void
    {
        $this->textboxAnswer = $textboxAnswer;
    }


}
