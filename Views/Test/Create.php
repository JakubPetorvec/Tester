<?php

use Entities\Test;

if(!isset($model)) $model = new Test();
if(!isset($errors)) $errors = [];
?>
<table class="question-table">
<tr><td><a href="index.php?controller=Test&action=index">Back</a></td></tr>
</table>
<?php foreach ($errors as $error) echo "<br>".$error ?>
<form method="post" action="index.php?controller=Test&action=create">
    <table class="question-table">
        <input type="hidden" name="sended" value="true">
        <thead><tr><td>Test name</td><td>Test percentage</td></tr></thead>
        <tr>
            <input type="hidden" name="id" value="<?php echo $model->getId()?>">
            <td><input type="text" name="name" value="<?php echo $model->getName()?>"></td>
            <td><input type="text" name="percentage" value="<?php echo $model->getPercentage()?>"></td>
        </tr>
        <tr><td></td><td><input type="submit" value="Create test"></td></tr>

    </table>
</form>
