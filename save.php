<?php
class Save
{
    public function save():void
    {
        $connection = new Connection();
        $areDataValidate = new DataValidation();

        $myErrors = [];

        if ($connection->connect() === true && $areDataValidate->validateData($_POST, $myErrors) === true)
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
        }
        if (!empty($myErrors))
        {
            ?><table class="table-errors"><?php
            foreach ($myErrors as $error)
            {
                ?><tr><td><?php echo $error ?></td></tr><?php
            }
            ?></table><?php
        }
    }
}




