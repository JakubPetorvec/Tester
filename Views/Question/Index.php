<?php
if (!isset($model))
{
    $model = [];
}
?>
<form method="get">
    <table class="question-table">
        <tr><td><h4><a href="Index.php?controller=Question&action=create&testId=<?php echo $_GET["testId"] ?>">Add question</a></h4></td></tr>
        <tr><td><h4><a href="Index.php?controller=Test">Tests</a></h4></td></tr>
    </table>
    <table class="question-table">
        <thead><tr><th>ID</th><th>Question</th><th>Type</th><th>EDIT</th><th>DELETE</th></tr></thead>
        <tbody>
        <?php
        foreach ($model["questions"] as $question)
        {
            ?>
            <tr>
                <td> <?php echo $question->getId(); ?> </td>
                <td> <?php echo $question->getQuestion(); ?> </td>
                <td> <?php echo $question->getType(); ?> </td>
                <td><a href="?controller=Question&action=update&questionId=<?php echo $question->getId(); ?>&testId=<?php echo $_GET["testId"]?>">Edit</a></td>
                <td><a href="?controller=Question&action=delete&questionId=<?php echo $question->getId(); ?>&testId=<?php echo $_GET["testId"]?>">Delete</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</form>
