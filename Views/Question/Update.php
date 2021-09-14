<?php

use Model\InputTable;

if (!isset($model)) $model = new InputTable();
if (!isset($errors)) $errors = [];

?><table><?php
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
            <td><input type="text" name="txtQuestion" value="<?php echo $model->getQuestion(); ?>"></td>
        </tr>
        <tr>
            <td><label>Button Type<input type="radio" name="type" value="button" <?php echo $model->getRadioButton(); ?>></label></td>
            <td><label>Textbox Type<input type="radio" name="type" value="textbox" <?php echo $model->getRadioText(); ?>></label></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns0" value="<?php echo $model->getAnswer0(); ?>"></td>
            <td><input type="checkbox" name="check[0]" <?php echo $model->getCheckBoxAnswer0(); ?>></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns1" value="<?php echo $model->getAnswer1(); ?>"></td>
            <td><input type="checkbox" name="check[1]" <?php echo $model->getCheckBoxAnswer1(); ?>></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns2" value="<?php echo $model->getAnswer2(); ?>"></td>
            <td><input type="checkbox" name="check[2]" <?php echo $model->getCheckBoxAnswer2(); ?>></td>
        </tr
        <tr><td></td><td><input type="submit" name="Submit" id="Submit" value="Uložit"></td></tr>
    </table>
</form>
