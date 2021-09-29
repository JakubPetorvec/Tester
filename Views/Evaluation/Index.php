<?php

use Model\Evaluation;

if(!isset($model)) $model = new Evaluation();
?>

<a href="index.php">Tests</a>

<table class="question-table">
    <thead><tr><td>ID</td><td>Test</td><td>Name</td><td>Start</td><td>Finish</td><td>Minimum Percentage</td><td>Test Percentage</td><td></td></tr></thead>
    <tbody>
        <?php
        foreach ($model as $row)
        {
            ?><tr><?php
                ?><td><?php echo $row->getId()?></td><?php
                ?><td><?php echo $row->getTestName()?></td><?php
                ?><td><?php echo $row->getName()?></td><?php
                ?><td><?php echo $row->getStart()?></td><?php
                ?><td><?php echo $row->getFinish()?></td><?php
                ?><td><?php echo $row->getNeededPercentage()?>%</td><?php
                ?><td><?php echo $row->getPercentage()?>%</td><?php
                ?><td><a href="Index.php?controller=Evaluation&action=evaluate&exam_id=<?php echo $row->getId()?>">Evaluate</a></td><?php
            ?></tr><?php
        }
        ?>
    </tbody>
</table>
