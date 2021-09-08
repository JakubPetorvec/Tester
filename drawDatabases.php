<?php

class DrawDatabases
{
    public function draw():void
    {
        include "connection.php";
        include "drawAnswer.php";
        include "drawQuestion.php";

        $connection = new Connection();

        $drawQuestion = new DrawQuestions();
        $drawAnswer = new DrawAnswers();

        $drawQuestion->draw($connection);
        $drawAnswer->draw($connection);
    }
}