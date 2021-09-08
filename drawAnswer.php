<?php

class DrawAnswers
{
    public function draw(Connection $connection):void
    {
        include "Entities/answer.php";
        include "answerSQLBuilder.php";
        include "answerMapper.php";


        if ($connection->connect() === true)
        {
            $answerSqlBuilder = new AnswerSQLBuilder();
            $myAnswers = $connection->getAll($answerSqlBuilder->buildGetAll());
            ?><table class="answer-table"><?php
            ?><thead><tr><th>ID</th><th>Question ID</th><th>Answer</th><th>Value</th></tr></thead><?php
            ?><tbody><?php
            foreach ($myAnswers as $myAnswer)
            {
                $answer = AnswerMapper::map($myAnswer);
                ?>
                <tr>
                    <td><?php echo $answer->getId() ?></td>
                    <td><?php echo $answer->getQuestionId() ?></td>
                    <td><?php echo $answer->getAnswer() ?></td>
                    <td><?php echo $answer->getValue() ?></td>
                </tr>
                <?php

            }
            ?></tbody><?php
            echo "</table>";
        }

    }
}