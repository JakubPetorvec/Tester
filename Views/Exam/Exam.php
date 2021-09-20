<?php

use Entities\Answer;
use Entities\Question;

if(!isset($model["questions"])) $model["questions"] = new Question();
if(!isset($model["answers"])) $model["answers"] = new Answer();
if(!isset($model["name"])) $model["name"] = "";
if(!isset($errors)) $errors = [];
?>


<table>
    <tr><?php
        foreach ($errors as $error){
            echo $error."<br/>";
        }
        ?></tr>
</table>

<form method="post">
    <input type="hidden" name="sended" value="1">
    <table>
        <tr><td>Name : <?php echo $model["name"]?></td></tr>
        <tr><td>----------------------------------</td></tr>
        <?php
        $counterQuestion = 0;
        foreach ($model["questions"] as $question)
        {
            ?><tr>
            <th><?php echo ($counterQuestion+1)?>. <input type="text" readonly name="question[<?php echo $model["questions"][$counterQuestion]->getId()?>]" value="<?php echo $question->getQuestion()?>"></th>
            <?php
            $counterAnswer = 0;
            if($question->getType() === "button")
            {
                foreach ($model["answers"][$counterQuestion] as $answer)
                {
                    if($answer->getQuestionId() == $question->getId())
                    {
                        ?><tr><td><?php echo ($counterAnswer+1).". "?><input type="radio" checked value="<?php echo $answer->getAnswer()?>" name="answer[<?php echo $counterQuestion?>]"><?php echo $answer->getAnswer()?></td></tr><?php
                    }
                    $counterAnswer++;
                }
            }
            else
            {
                ?><tr><td>1. <input type="text" name="answer[<?php echo $counterQuestion?>]"></td></tr><?php
            }
            $counterQuestion++;
            ?>
            </tr>
            <tr><td>----------------------------------</td></tr><?php
        }
        ?>
        <tr><td><input type="submit" value="Send Answers"></td></tr>
    </table>
</form>

