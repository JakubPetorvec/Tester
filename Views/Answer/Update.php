<?php

use Entities\Answer;

if(!isset($model)) $model = new Answer();
if(!isset($errors)) $errors = [];

if($model->getValue()==="TRUE")
{
    $true = "checked";
    $false = "";
}
else{
    $true = "";
    $false = "checked";
}

?>

<form method="post">
    <input type="hidden" name="sended" value="1">
    <table class="input-table">
        <tr><td>Answer</td><td>Value</td></tr>
        <tr>
            <td><input type="text" name="answer" value="<?php echo $model->getAnswer()?>"></td>
            <td><input type="radio" name="value" value="TRUE" <?php echo $true?>>True</td>
            <td><input type="radio" name="value" value="FALSE" <?php echo $false?>>False</td>
        </tr>
        <tr><td><input type="submit" name="Submit" value="Add Answer"></td></tr>
    </table>
</form>
