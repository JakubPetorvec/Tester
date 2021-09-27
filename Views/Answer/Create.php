<?php
use Entities\Answer;

if(!isset($model)) $model = new Answer();
if(!isset($errors)) $errors = [];
?>
<a href="Index.php?controller=Question&action=update&test_id=<?php echo $_GET["test_id"]?>&question_id=<?php echo $_GET["question_id"]?>">Question</a>
<?php
foreach ($errors as $error)
{
    echo "<br>".$error;
}
?>
<form method="post">
    <input type="hidden" name="sended" value="1">
    <table class="input-table">
        <tr><td>Answer</td><td>Value</td></tr>
        <tr>
            <td><input type="text" name="answer" value="<?php echo $model->getAnswer()?>"></td>
            <td><input type="radio" name="value" value="1" checked>True</td>
            <td><input type="radio" name="value" value="0">False</td>
        </tr>
        <tr><td><input type="submit" name="Submit" value="Add Answer"></td></tr>
    </table>
</form>
