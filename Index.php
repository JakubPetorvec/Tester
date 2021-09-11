
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tester</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
<?php

use Renderers\DrawDatabases;
use Operations\Save;
use Operations\Update;
use Operations\Filler;
use Entities\InputTable;
use Operations\Delete;

spl_autoload_register(function ($class){
    $filePath = str_replace("\\", "/", $class).".php";
    if(file_exists($filePath))
    {
        include_once ($filePath);
    }
});

$txtQuestion = "";
$txtAns0 = "";
$txtAns1 = "";
$txtAns2 = "";
$checkBox0 = "";
$checkBox1 = "";
$checkBox2 = "";
$radioButton0 = "checked";
$radioButton1 = "";
$buttonValue = "save";
$action = "0";

if(isset($_POST["action"])){
    $action = "1";
}

$save = new Save();
$fillInputTable = new Filler();
$inputTable = new InputTable();

$currentAction = "create";
if (isset($_GET["action"])) $currentAction = $_GET["action"];

$isSended = false;
if (isset($_POST["sended"])) $isSended = $_POST["sended"];

if($currentAction === "create")
{
    if($isSended)
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
}
elseif ($currentAction == "update")
{
    if ($isSended)
    {
        echo "foo";
        if(true)
        {
            $update = new Update();
            if(!$update->update($_GET["questionId"], $_POST)) echo "Error [Update cannot be processed]";
            header("Location: index.php");
            exit();
        }
    }

    echo "Editing question with id: ".$_GET["questionId"];
    $fillInputTable->fill($_GET["questionId"], $inputTable);
    $txtQuestion = $inputTable->getQuestion();
    $txtAns0 = $inputTable->getAnswer0();
    $txtAns1 = $inputTable->getAnswer1();
    $txtAns2 = $inputTable->getAnswer2();
    $radioButton0 = $inputTable->getRadioButton();
    $radioButton1 = $inputTable->getRadioText();
    $checkBox0 = $inputTable->getCheckBoxAnswer0();
    $checkBox1 = $inputTable->getCheckBoxAnswer1();
    $checkBox2 = $inputTable->getCheckBoxAnswer2();

}
elseif ($currentAction == "delete")
{
    $delete = new Delete();
    $delete->delete($_GET["questionId"]);
    header("Location: index.php");
    exit();
}
?>
<form name="frmSave" method="post">
    <input type="hidden" name="sended" value="1">
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
        <tr><td></td><td><input type="submit" name="Submit" id="Submit" value="<?php echo $buttonValue?>"></td></tr>
    </table>
</form>
<?php


$drawDatabases = new DrawDatabases();
$drawDatabases->draw();
?>
</body>
</html>