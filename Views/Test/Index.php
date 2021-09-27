<?php

use Entities\Test;

if (!isset($model)) $model = new Test();
?>
<a href="Index.php?controller=Evaluation&action=index">Evaluate exams</a>
<a href="index.php?controller=Test&action=create"><h4>Create new test</h4></a>
<form>
    <table class="question-table">
        <thead><tr><th>ID</th><th>Name</th><th>Percentage</th><th></th><th></th><th></th></tr></thead>
        <tbody>
        <?php
        foreach ($model as $test)
        {
            ?><tr>
                <td><?php echo $test->getId()?></td>
                <td><?php echo $test->getName()?></td>
                <td><?php echo $test->getPercentage()?>%</td>
                <td><a href="index.php?controller=Question&action=index&test_id=<?php echo $test->getId()?>">Edit</a></td>
                <td><a href="index.php?controller=Exam&action=index&test_id=<?php echo $test->getId()?>">Take</a></td>
                <td><a href="index.php?controller=Test&action=delete&test_id=<?php echo $test->getId()?>">Delete</a></td>

        </tr><?php
        }

        ?>
        </tbody>
    </table>
</form>
