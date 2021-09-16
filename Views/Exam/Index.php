<?php
if(!isset($model)) $model = [];
if(!isset($answers)) $answers = [];
if(!isset($errors)) $errors = [];
?>

<table>
    <tr><?php
      foreach ($errors as $error){
          echo $error."<br/>";
      }
    ?></tr>
</table>

<form method="post" action="Index.php?controller=Exam&action=index&valid=true&test_id=<?php echo $_GET["test_id"]?>">

    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
            <td><?php echo "Date : ".date('d.m.20y')?></td>
        </tr>
    </table>

    <table>
        <tr><td>---------------------------------</td><td>----------------------------</td></tr>
        <tr><td>Question</td><td>Answer</td></tr>
        <?php
        $counter = 0;
        foreach ($model["questions"] as $question)
        {
            ?><tr>
            <input type="hidden" name="questionId[<?php echo $counter?>]" value="<?php echo $question->getId()?>">
            <td><input name="questions[<?php echo $counter?>]" type="text" readonly value="<?php echo $question->getQuestion()?>"></td>
            <?php
            if($question->getType() == "0")
            {
                ?><td><input type="text" name="answers[<?php echo $counter?>]"></td><?php
            }
            else{
                ?><td><select name="answers[<?php echo $counter?>]">
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
        <tr><td></td><td><input type="submit" value="Send Answers"></td></tr>
    </table>
</form>



