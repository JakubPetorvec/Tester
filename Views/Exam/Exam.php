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

<form method="post">
    <input type="hidden" name="sended" value="1">
    <input type="hidden" name="sendedExam" value="1">
    <table>
        <tr><td>Name</td></tr>
        <tr><td><input type="text" name="name" value="<?php echo $_POST["name"]?>"></td></tr>
        <tr><td>----------------------------------</td></tr>
        <?php
        foreach ($model as $question)
        {
            ?><tr>
            <td><?php echo $question->question->getQuestion()?></td>
            <?php
            if($question->question->getType() === "button")
            {
                foreach ($question->answers as $answer)
                {
                    ?><tr><td><input type="radio" checked value="<?php echo $answer->getId()?>" name="answer[<?php echo $question->question->getId()?>]"><?php echo $answer->getAnswer()?></td></tr><?php
                }
            }
            else
            {
                ?><tr><td><input type="text" name="answer[<?php echo $question->question->getId()?>]"></td></tr><?php
            }
            ?>
            </tr>
            <tr><td>----------------------------------</td></tr><?php
        }
        ?>
        <tr><td><input type="submit" value="Send Answers"></td></tr>
    </table>
</form>

