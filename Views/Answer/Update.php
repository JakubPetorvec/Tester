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
    <table class="question-table">
        <thead><tr><td>Answer</td><td>Value</td><td></td></tr></thead>
        <tr>
            <td><input type="text" name="answer" value="<?php echo $model->getAnswer()[0]?>"></td>
            <td><input type="radio" name="value" value="1" <?php echo $true?>>True</td>
            <td><input type="radio" name="value" value="0" <?php echo $false?>>False</td>
        </tr>
        <tr><td><input type="submit" name="Submit" value="Add Answer"></td><td></td><td></td></tr>
    </table>
</form>
