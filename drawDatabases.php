<?php

class DrawDatabases
{
    public function draw():void
    {
        $connection = new Connection();

        $drawQuestion = new DrawQuestions();
        $drawAnswer = new DrawAnswers();

        $drawQuestion->draw($connection);
        $drawAnswer->draw($connection);
    }
}