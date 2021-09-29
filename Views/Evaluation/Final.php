<?php

if(!isset($model)) $model = [];
?>

<h1>Test succes rate is : <?php echo $model["score"]?>%</h1>
<h1>minimum score for passing is : <?php echo $model["test"]->getPercentage()?></h1>
<?php if($model["test"]->getPercentage() <= $model["score"])
{
    ?><h1>You passed the exam!</h1><?php
}
else
{
    ?><h1>You failed the exam!</h1><?php
}

?>
<form action="Index.php?controller=Evaluation&action=index">
    <input type="submit" value="Back">
</form>