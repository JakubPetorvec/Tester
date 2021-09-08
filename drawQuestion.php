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

            $fillDataList = new FillDataList();
            $questionId = [];
            foreach ($myQuestions as $myQuestion)
            {
                $question = QuestionMapper::map($myQuestion);
                array_push($questionId,$question->getId())
                ?>
                <tr>
                    <td><?php echo $question->getId() ?></td>
                    <td><?php echo $question->getQuestion() ?></td>
                    <td><?php echo $question->getType() ?></td>
                </tr>
                <?php

            }
            $fillDataList->fill($questionId);
            ?></tbody><?php
            echo "</table>";
        }
    }
}
