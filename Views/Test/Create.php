<?php

use Entities\Test;

if(!isset($model)) $model = new Test();
if(!isset($errors)) $errors = [];
?>

<a href="index.php?controller=Test&action=index">Back</a>
<?php foreach ($errors as $error) echo "<br>".$error ?>
<form method="post" action="index.php?controller=Test&action=create">
    <table>
        <input type="hidden" name="sended" value="true">
        <tr><td>Test name</td><td>Test percentage</td></tr>
        <tr>
            <input type="hidden" name="id" value="<?php echo $model->getId()?>">
            <td><input type="text" name="name" value="<?php echo $model->getName()?>"></td>
            <td><input type="text" name="percentage" value="<?php echo $model->getPercentage()?>"></td>
        </tr>
        <tr><td></td><td><input type="submit" value="Create test"></td></tr>

    </table>
</form>
