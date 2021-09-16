<?php

if(!isset($model)) $model = [];
if(!isset($errors)) $errors = [];
?>

<a href="index.php?controller=Test&action=index">Back</a>
<?php foreach ($errors as $error) echo "<br>".$error ?>
<form method="post" action="index.php?controller=Test&action=create">
    <table>
        <input type="hidden" name="sended" value="true">
        <tr><td>Test name</td><td>Test percentage</td></tr>
        <tr>
            <td><input type="text" name="testName" value="<?php echo $model->getTestName()?>"></td>
            <td><input type="text" name="testPercentage" value="<?php echo $model->getTestPercentage()?>"></td>
        </tr>
        <tr><td></td><td><input type="submit" value="Create test"></td></tr>

    </table>
</form>
