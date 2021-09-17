<?php

use Entities\Question;

if (!isset($model)) $model = new Question();
if (!isset($errors)) $errors = [];
?><table><?php
?><tr><h4><a href="Index.php?controller=Question&action=index&test_id=<?php echo $model->getTestId()?>">Questions</a></h4></tr></tr><?php
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
            <td><input type="text" name="question" value="<?php echo $model->getQuestion(); ?>"></td>
        </tr>
        <tr>
            <td><label>Button Type<input type="radio" name="type" value="button" checked></label></td>
            <td><label>Textbox Type<input type="radio" name="type" value="textbox"></label></td>
        <tr><td></td><td><input type="submit" name="Submit" id="Submit" value="Add"></td></tr>
    </table>
</form>