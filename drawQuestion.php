<?php

class DrawQuestions
{
    public function draw(Connection $connection):void
    {
        if ($connection->connect() === true)
        {
            $questionSqlBuilder = new QuestionSQLBuilder();
            $myQuestions = $connection->getAll($questionSqlBuilder->buildGetAll());
            ?><table class="question-table"><?php
            ?><thead><tr><th>ID</th><th>Question</th><th>Type</th></tr></thead><?php
            ?><tbody><?php
            foreach ($myQuestions as $myQuestion)
            {
                $question = QuestionMapper::map($myQuestion);
                ?>
                <tr>
                    <td><?php echo $question->getId() ?></td>
                    <td><?php echo $question->getQuestion() ?></td>
                    <td><?php echo $question->getType() ?></td>
                </tr>
                <?php

            }
            ?></tbody><?php
            echo "</table>";
        }
    }
}
