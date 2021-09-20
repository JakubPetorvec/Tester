<?php

if(!isset($modul)) $modul = "";
if(!isset($errors)) $errors = [];
?>
<a href="Index.php">Tests</a>
<?php
foreach ($errors as $error)
{
    echo "<br>".$error;
}
?>
<form method="post">
    <input type="hidden" name="sended" value="1">
    <table class="input-table">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php $modul?>"></td>
            <td><label name="<?php echo "Date : ".date('d.m.20y')?>"><?php echo "Date : ".date('d.m.20y')?></label></td>
        </tr>
        <tr><td></td><td><input type="submit" value="Start Test"></td></tr>
    </table>
</form>





