<?php
if(!isset($model)) $model = [];
if(!isset($answers)) $answers = [];
?>

<table>
    <tr>
        <td>Name</td>
        <td><input type="text"></td>
        <td><?php echo "Date : ".date('d.m.20y')?></td>
    </tr>
</table>

<form>
    <table>
        <?php
        $counter = 0;
        foreach ($model["questions"] as $question)
        {
            ?><tr>
            <td><input type="text" readonly value="<?php echo $question->getQuestion()?>"></td>
            <?php
            if($question->getType() == "0")
            {
                ?><td><input type="text"></td><?php
            }
            else{
                ?><td><select>
                    <?php
                    for ($i = 0; $i < 3; $i++){
                        $answer = $answers[$counter][$i]["answer"];
                        ?><option value="<?php echo $answer?>"><?php echo $answer?></option><?php
                    }
                    ?>
                    </select></td><?php
            }
            ?>
            </tr><?php
            $counter++;
        }
        ?>
        <tr><td><input type="submit" value="Send Answers"></td></tr>
    </table>
</form>



