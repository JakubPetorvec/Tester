<?php

use Entities\Answer;
use Entities\Question;

if (!isset($model))
{
    $model["question"] = new Question();
    $model["answers"] = new Answer();
}
if (!isset($errors)) $errors = [];
?><table class="question-table"><?php
    if($model["question"]->getType() ==="button")
    {
        ?><tr><td><a href="Index.php?controller=Answer&action=create&testId=<?php echo $model["question"]->getTestId()?>&id=<?php echo $model["question"]->getId()?>">Add Answer</a> </td></tr><?php
    }

    ?><tr><td><h4><a href="Index.php?controller=Question&action=index&testId=<?php echo $model["question"]->getTestId()?>&id=<?php echo $model["question"]->getId()?>">Questions</a></h4></td></tr><?php
    foreach ($errors as $error)
    {
        ?><tr><td> <?php echo $error?></td></tr><?php
    }
    ?></table>

<form name="frmSave" method="post">
    <input type="hidden" name="sended" value="1">
    <table class="question-table">
        <thead><tr><td><label>Question</label></td></tr></thead>
        <tr><td><input type="text" name="question" value="<?php echo $model["question"]->getQuestion(); ?>"></td></tr>
        <tr><td><input type="submit" name="Submit" id="Submit" value="Uložit"></td></tr>
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
            <td><?php echo $answer->getAnswer()[0];?></td>
            <td><?php echo $answer->getValue();;?></td>
            <td><a href="Index.php?controller=Answer&action=update&id=<?php echo $_GET["testId"]?>&questionId=<?php echo $answer->getQuestionId()?>&answerId=<?php echo $answer->getId();?>">Edit</a></td>
            <td><a href="Index.php?controller=Answer&action=delete&id=<?php echo $_GET["testId"]?>&questionId=<?php echo $answer->getQuestionId()?>&answerId=<?php echo $answer->getId();?>" >Delete</a></td>
        </tr> <?php
        }
        ?>
    </table><?php } ?>
</form>
