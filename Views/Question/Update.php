<?php

use Entities\Answer;
use Entities\Question;

if (!isset($model))
{
    $model["question"] = new Question();
    $model["answers"] = new Answer();
}
if (!isset($errors)) $errors = [];
?><table><?php
    if($model["question"]->getType() ==="button")
    {
        ?><tr><td><a href="Index.php?controller=Answer&action=create&test_id=<?php echo $model["question"]->getTestId()?>&question_id=<?php echo $model["question"]->getId()?>">Add Answer</a> </td></tr><?php
    }

    ?><tr><h4><a href="Index.php?controller=Question&action=index&test_id=<?php echo $model["question"]->getTestId()?>&question_id=<?php echo $model["question"]->getId()?>">Questions</a></h4></tr><?php
    foreach ($errors as $error)
    {
        ?><tr><td> <?php echo $error?></td></tr><?php
    }
    ?></table>

<form name="frmSave" method="post">
    <input type="hidden" name="sended" value="1">
    <table class="input-table">
        <tr>
            <td><label>Question</label></td>
            <td><input type="text" name="question" value="<?php echo $model["question"]->getQuestion(); ?>"></td>
        </tr>
        <tr><td></td><td><input type="submit" name="Submit" id="Submit" value="Uložit"></td></tr>
        <tr></tr>
    </table>
    <?php if($model["question"]->getType() ==="button"){?>
    <table class="question-table">
        <thead><tr><td>Answer ID</td><td>Question ID</td><td>Answer</td><td>Value</td><td></td><td></td></tr></thead>
        <?php
        foreach ($model["answers"] as $answer)
        {
            ?><tr>
            <td><?php echo $answer->getId();?></td>
            <td><?php echo $answer->getQuestionId();?></td>
            <td><?php echo $answer->getAnswer();?></td>
            <td><?php echo $answer->getValue();;?></td>
            <td><a href="Index.php?controller=Answer&action=update&test_id=<?php echo $_GET["test_id"]?>&question_id=<?php echo $answer->getQuestionId()?>&answer_id=<?php echo $answer->getId();?>">Edit</a></td>
            <td><a href="Index.php?controller=Answer&action=delete&test_id=<?php echo $_GET["test_id"]?>&question_id=<?php echo $answer->getQuestionId()?>&answer_id=<?php echo $answer->getId();?>" >Delete</a></td>
        </tr> <?php
        }
        ?>
    </table><?php } ?>
</form>
