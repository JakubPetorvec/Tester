<?php

namespace Renderers;
use DB\Connection;
use SQLBuilders\QuestionSQLBuilder;
use Mappers\QuestionMapper;
use \FillDataList;

class DrawQuestions
{
    public function draw(Connection $connection):void
    {
        if ($connection->connect() === true)
        {
            $questionSqlBuilder = new QuestionSQLBuilder();
            $myQuestions = $connection->getAll($questionSqlBuilder->buildGetAll());
            ?><form method="post" action="index.php"><?php
            ?><table class="question-table"><?php
            ?><thead><tr><th>ID</th><th>Question</th><th>Type</th></tr></thead><?php
            ?><tbody><?php
            ?><input type="hidden" name="action" value="1"><?php

            foreach ($myQuestions as $myQuestion)
            {
                $question = QuestionMapper::map($myQuestion);
                ?>
                <tr>
                    <td><input type="submit" name="questionId" value="<?php echo $question->getId() ?>"></td>
                    <td><?php echo $question->getQuestion() ?></td>
                    <td><?php echo $question->getType() ?></td>
                </tr>
                <?php

            }
            ?></tbody><?php
            ?></table><?php
            ?></form><?php
        }
    }
}
