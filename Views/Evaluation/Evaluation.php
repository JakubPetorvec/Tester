<?php
use Model\EvaluationModel;

if(!isset($model)) $model = new EvaluationModel();
?>

<form method="post">
    <input type="hidden" name="sended" value="1">
    <input type="hidden" name="testLenght" value="<?php echo sizeof($model )?>">
    <table class="question-table">
        <thead><tr><td>Question</td><td>Answer</td><td>True / False</td></tr></thead>
        <?php foreach ($model as $row)
        {
            ?><tr>
            <td><?php echo $row->getQuestion()?></td>
            <?php if($row->getType() === "button"){
                ?><td><?php echo $row->getAnswer()?></td><?php
                if($row->getValue() === "1")
                {
                    ?><td><?php echo "True"?></td><?php
                    ?><input type="hidden" name="isRight[<?php echo $row->getId()?>]" value="<?php echo $row->getValue()?>"><?php
                }
                else {?><td><?php echo "False"?></td><?php }
            }
            else
            {
                ?><td><?php echo $row->getTextboxAnswer()?></td><?php
                ?><td><input type="checkbox" name="isRight[<?php echo $row->getId()?>]"></td><?php
            }
            ?></tr><?php
        }
        ?>
        <tr><td></td><td></td><td><input type="submit" name="Evaluate" value="Evaluate"></td></tr>
    </table>
</form>
