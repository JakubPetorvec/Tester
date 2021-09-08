<?php
class Save
{
    public function save():void
    {
        print_r($_POST);
        $connection = new Connection();
        $areDataValidate = new DataValidation();

        $myErrors = [];

        if ($connection->connect() === true && $areDataValidate->validateData($_POST, $myErrors) === true)
        //if ($connection->connect() === true)
        {
            $questionParser = new QuestionParser();
            $question = $questionParser->parse($_POST);

            $questionSqlBuilder = new QuestionSqlBuilder();
            $insertSql = $questionSqlBuilder->buildInsert($question);

            $questionId = $connection->insert($insertSql);

            $isButtonType = new AnswerTypes();
            if($isButtonType->isButtonType($_POST)){
                for($i = 0; $i <3; $i++)
                {
                    $answerParser = new AnswerParser();
                    $answer = $answerParser->parse($_POST, $questionId, $i);

                    $answerSqlBuilder = new AnswerSQLBuilder();
                    $insertSql = $answerSqlBuilder->buildInsert($answer);
                    $connection->insert($insertSql);
                }
            }
            /*
            $myQuestions = $connection->getAll($questionSqlBuilder->buildGetAll());
            foreach ($myQuestions as $myQuestion) { $question = QuestionMapper::map($myQuestion);}

            $myAnswers = $connection->getAll($answerSqlBuilder->buildGetAll());
            foreach ($myAnswers as $myAnswer) { $answer = AnswerMapper::map($myAnswer);}
            */

            /* header("Location: index.php", true, 301);
             exit();*/
        }
        print_r($myErrors);
        /*else
        {
            echo '<script type="text/javascript">';
            echo 'window.history.back()';
            echo '</script>';

            echo '<script type="text/javascript">';
            echo ' alert("JavaScript Alert Box by PHP")';
            echo '</script>';
        }*/
    }
}




