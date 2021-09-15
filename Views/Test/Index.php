<?php
if (!isset($model)) $model = [];
?>

<form>
    <table>
        <tr><td><h4>Test ID</h4></td><td><h4>Test name</h4></td></tr>
        <?php
        foreach ($model as $test)
        {
            ?><tr>
                <td><?php echo $test["id"]?></td>
                <td><?php echo $test["name"]?></td>
                <td><a href="index.php?controller=Test&action=edit&test_id=<?php echo $test["id"]?>">Select</a></td>

        </tr><?php
        }

        ?>
    </table>
</form>
