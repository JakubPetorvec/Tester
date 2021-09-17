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
            <td><input type="text" name="txtQuestion" value="<?php echo $model["question"]->getQuestion(); ?>"></td>
        </tr>
        <tr><td></td><td><input type="submit" name="Submit" id="Submit" value="Uložit"></td></tr>
        <tr><td>UDĚLAT ODPOVĚDI</td></tr>
    </table>
</form>
