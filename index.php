
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tester</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
<?php
include "Entities/question.php";
include "Entities/answer.php";
include "connection.php";
include "questionSQLBuilder.php";
include "questionMapper.php";
include "questionParser.php";
include "answerSQLBuilder.php";
include "answerMapper.php";
include "answerParser.php";
include "answerTypes.php";
include "dataValidation.php";
include "drawQuestion.php";
include "drawDatabases.php";
include "drawAnswer.php";
include "save.php";

print_r($_POST);

$txtQuestion = "";
$txtAns0 = "";
$txtAns1 = "";
$txtAns2 = "";
$checkBox0 = "";
$checkBox1 = "";
$checkBox2 = "";
$radioButton0 = "checked";
$radioButton1 = "";

$save = new Save();

if(isset($_POST["hidden"]))
{
    $save->save();
    $txtQuestion = $_POST["txtQuestion"];
    $txtAns0 = $_POST["txtAns0"];
    $txtAns1 = $_POST["txtAns1"];
    $txtAns2 = $_POST["txtAns2"];

    $checkBox0 = isset($_POST["check"][0]) ? "checked" : "";
    $checkBox1 = isset($_POST["check"][1]) ? "checked" : "";
    $checkBox2 = isset($_POST["check"][2]) ? "checked" : "";
    if($_POST["type"] == "button") {$radioButton0 = "checked"; $radioButton1 = "";}
    else {$radioButton0 = ""; $radioButton1 = "checked";}
}
?>
<form name="frmSave" method="post" action="index.php">
    <input type="hidden" name="hidden" value="0">
    <table class="input-table">
        <tr>
            <td><label>Question</label></td>
            <td><input type="text" name="txtQuestion" value="<?php echo $txtQuestion?>"></td>
        </tr>
        <tr>
            <td><label>Button Type<input type="radio" name="type" value="button" <?php echo $radioButton0?>></label></td>
            <td><label>Textbox Type<input type="radio" name="type" value="textbox" <?php echo $radioButton1?>></label></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns0" value="<?php echo $txtAns0?>"></td>
            <td><input type="checkbox" name="check[0]" <?php print_r($checkBox0) ?>></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns1" value="<?php echo $txtAns1?>"></td>
            <td><input type="checkbox" name="check[1]" <?php echo $checkBox1?>></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns2" value="<?php echo $txtAns2?>"></td>
            <td><input type="checkbox" name="check[2]" <?php echo $checkBox2?>></td>
        </tr>
        <tr><td></td><td><input type="submit" name="Submit" id="Submit" value="Save"></td></tr>
    </table>
</form>
<?php
$drawDatabases = new DrawDatabases();

$drawDatabases->draw();
?>
</body>
</html>