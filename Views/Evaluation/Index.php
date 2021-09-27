<?php

use Model\Evaluation;

if(!isset($model)) $model = new Evaluation();
?>

<a href="index.php">Tests</a>

<table class="question-table">
    <thead><tr><td>ID</td><td>Name</td><td>Date</td><td></td></tr></thead>
    <tbody>
        <?php
        foreach ($model as $row)
        {
            ?><tr><?php
                ?><td><?php echo $row->getId()?></td><?php
                ?><td><?php echo $row->getName()?></td><?php
                ?><td><?php echo $row->getDate()?></td><?php
                ?><td><a href="Index.php?controller=Evaluation&action=evaluate&exam_id=<?php echo $row->getId()?>">Evaluate</a></td><?php
            ?></tr><?php
        }
        ?>
    </tbody>
</table>
