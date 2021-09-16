<?php
if (!isset($model)) $model = [];
?>

<a href="index.php?controller=Test&action=create"><h4>Create new test</h4></a>
<form>
    <table class="question-table">
        <thead><tr><th>ID</th><th>Name</th><th>Percentage</th><th></th><th></th><th></th></tr></thead>
        <tbody>
        <?php
        foreach ($model as $test)
        {
            ?><tr>
                <td><?php echo $test["id"]?></td>
                <td><?php echo $test["name"]?></td>
                <td><?php echo $test["percentage"]?>%</td>
                <td><a href="index.php?controller=Question&action=index&test_id=<?php echo $test["id"]?>">Edit</a></td>
                <td><a href="index.php?controller=Exam&action=index&test_id=<?php echo $test["id"]?>">Take</a></td>
                <td><a href="index.php?controller=Test&action=delete&test_id=<?php echo $test["id"]?>">Delete</a></td>

        </tr><?php
        }

        ?>
        </tbody>
    </table>
</form>
