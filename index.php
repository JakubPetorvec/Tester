
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tester</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
<form name="frmSave" method="post" action="save.php">
    <table class="input-table">
        <tr>
            <td><label>Question</label></td>
            <td><input type="text" name="txtQuestion" id="txtQuestion"></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns0" id="txtAns0"></td>
            <td><input type="checkbox" name="check[0]" value="1"></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns1" id="txtAns1"></td>
            <td><input type="checkbox" name="check[1]" value="1"></td>
        </tr>
        <tr>
            <td><label>Answer</label></td>
            <td><input type="text" name="txtAns2" id="txtAns2"></td>
            <td><input type="checkbox" name="check[2]" value="1"></td>
        </tr>
        <tr><td></td><td><input type="submit" name="Submit" id="Submit" value="Save"></td></tr>
    </table>
</form>
<?php
include "drawDatabases.php";

$drawDatabases = new DrawDatabases();

$drawDatabases->draw();
?>
</body>
</html>