<?php

use Entities\Answer;
use Entities\Question;

if(!isset($model)) $model = new stdClass();
if(!isset($errors)) $errors = [];
?>


<table>
    <tr><?php
        foreach ($errors as $error){
            echo $error."<br/>";
        }
        ?></tr>
</table>

<form method="post" action="?controller=Exam&action=save">
    <input type="hidden" name="sended" value="1">
    <input type="hidden" name="exam_id" value="<?php echo $model["examId"]?>">
    <input type="hidden" name="test_id" value="<?php echo $_GET["test_id"]?>">
    <table class="question-table">
        <thead><tr><td>Name : <?php echo $_POST["name"]?></td></tr></thead>
        </table>
        <?php
        foreach ($model["groupedQuestions"] as $question)
        {
            ?><table class="question-table"><?php
            ?><thead><tr><td><?php echo $question->question->getQuestion()?></td></tr></thead>
            <?php
            if($question->question->getType() === "button")
            {
                foreach ($question->answers as $answer)
                {
                    ?><tr><td><input type="radio" value="<?php echo $answer->getId()?>" name="answer[<?php echo $question->question->getId()?>]" id="<?php echo $answer->getValue()?>"><?php echo $answer->getAnswer()?></td></tr><?php
                }
            }
            else
            {
                ?><tr><td><textarea name="answer[<?php echo $question->question->getId()?>]" rows="4" cols="60"></textarea></td></tr><?php
            }
            ?>
            </tr>
            </table>
            <br />
            <?php
        }
        ?>
    <table class="question-table"><tr><td><input type="submit" value="Send Answers"></td></tr></table>
</form>

