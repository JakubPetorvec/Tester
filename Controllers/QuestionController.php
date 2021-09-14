<?php

namespace Controllers;

use DB\Connection;
use Mappers\QuestionMapper;
use Model\InputTable;
use Operations\Delete;
use Operations\Filler;
use Operations\Save;
use Operations\Update;
use SQLBuilders\QuestionSQLBuilder;

class QuestionController extends BaseControlller
{
    public function indexAction()
    {
        $sqlBuilder = new QuestionSQLBuilder();

        $connection = new Connection();
        $connection->connect();
        $questionsData = $connection->getAll($sqlBuilder->buildGetAll());
        $questions = [];

        foreach ($questionsData as $question)
        {
            $questions[] = QuestionMapper::map($question);
        }

        $this->view("Index.php", ['questions' => $questions]);
    }

    public function createAction()
    {
        $isSended = false;
        if (isset($_POST["sended"])) $isSended = $_POST["sended"];
        $txtQuestion = "";
        $txtAns0 = "";
        $txtAns1 = "";
        $txtAns2 = "";
        $checkBox0 = "";
        $checkBox1 = "";
        $checkBox2 = "";
        $radioButton0 = "checked";
        $radioButton1 = "";
        $buttonValue = "save";
        $answers = [];

        if($isSended)
        {
            $save = new Save();
            $save->save($_POST);
            $txtQuestion = $_POST["txtQuestion"];
            $txtAns0 = $_POST["txtAns0"];
            $txtAns1 = $_POST["txtAns1"];
            $txtAns2 = $_POST["txtAns2"];

            $checkBox0 = isset($_POST["check"][0]) ? "checked" : "";
            $checkBox1 = isset($_POST["check"][1]) ? "checked" : "";
            $checkBox2 = isset($_POST["check"][2]) ? "checked" : "";
            if($_POST["type"] == "button") {$radioButton0 = "checked"; $radioButton1 = "";}
            else {$radioButton0 = ""; $radioButton1 = "checked";}

            $inputTable = new InputTable();
            $inputTable->setQuestion($txtQuestion);
            $inputTable->setAnswer0($txtAns0);
            $inputTable->setAnswer1($txtAns1);
            $inputTable->setAnswer2($txtAns2);
            $inputTable->setCheckBoxAnswer0($checkBox0);
            $inputTable->setCheckBoxAnswer1($checkBox1);
            $inputTable->setCheckBoxAnswer2($checkBox2);
            $inputTable->setRadioButton($radioButton0);
            $inputTable->setRadioText($radioButton1);

            $this->view("Create.php", $inputTable);
        }
        else
            $this->view("Create.php", new InputTable());
    }

    public function updateAction()
    {
        $isSended = false;
        if (isset($_POST["sended"])) $isSended = $_POST["sended"];


        $txtQuestion = "";
        $txtAns0 = "";
        $txtAns1 = "";
        $txtAns2 = "";
        $checkBox0 = "";
        $checkBox1 = "";
        $checkBox2 = "";
        $radioButton0 = "checked";
        $radioButton1 = "";
        $buttonValue = "save";
        $answers = [];

        $fillInputTable = new Filler();
        $inputTable = new InputTable();
        echo "Editing question with id: ".$_GET["questionId"];
        $fillInputTable->fill($_GET["questionId"], $inputTable);
        $txtAns0 = $inputTable->getAnswer0();
        $txtAns1 = $inputTable->getAnswer1();
        $txtAns2 = $inputTable->getAnswer2();
        $radioButton1 = $inputTable->getRadioText();
        $checkBox0 = $inputTable->getCheckBoxAnswer0();
        $checkBox1 = $inputTable->getCheckBoxAnswer1();
        $checkBox2 = $inputTable->getCheckBoxAnswer2();
        $answers = [0 => $txtAns0,
            1 => $txtAns1,
            2 => $txtAns2,
            3 => $checkBox0,
            4 => $checkBox1,
            5 => $checkBox2];

        if ($isSended)
        {
            $update = new Update();
            if(!$update->update($_POST, $_GET["questionId"], $answers, $radioButton1)) echo "Error [Update cannot be processed]";
        }

        $this->view("Update.php", $inputTable);
    }

    public function deleteAction()
    {
        $delete = new Delete();
        $delete->delete($_GET["questionId"]);
    }
}
