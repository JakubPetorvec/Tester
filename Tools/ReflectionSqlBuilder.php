<?php

namespace Tools;

use Exception;

class ReflectionSqlBuilder
{
    private object $entity;
    private string $selectors = "";
    private string $dbName = "";
    private bool $deleteAll = false;

    function __construct(object $entity)
    {
        $this->entity = $entity;
        $this->fill();
    }

    // function for getting data from database
    // when id = null all data is selected, otherwise only exact row is selected
    // returns string with sql query
    public function buildGetAll(string $id = null): string
    {
        return "SELECT {$this->selectors} FROM {$this->dbName}".($id === null ? "" : " WHERE id = {$id}");
    }

    // function for getting data from database based on chosen selector
    // selector is selected in format -> "['selector name' => value]"
    // returns string with sql query
    public function buildGetAllBySelector(array $selector): string
    {
        $selectorsArray = explode(", ",$this->selectors);

        $searchParameters = "";
        foreach ($selector as $param => $value)
        {
            if(in_array($param ,$selectorsArray)) $searchParameters .= " AND {$param} = {$value}";
            else throw new Exception("Selector {$param} does not exist in entity {$this->dbName}");
        }
        if($searchParameters === "")
            throw new Exception("No selectors chosen!");
        $searchParameters = substr($searchParameters, 4);

        return "SELECT {$this->selectors} FROM {$this->dbName} WHERE {$searchParameters}";
    }

    // function for inserting everything in chosen database based on nothing
    // inserting everything from given array
    // returns string with sql query
    public function buildInsert(array $data): string
    {
        if($data === [])
            throw new Exception("No data passed to insert function");

        $selectorsArray = explode(", ",$this->selectors);
        if(count($data) > count($selectorsArray))
            throw new Exception("Too much parameters in insert function");

        $values = "";

        for($i = 0; $i < count($selectorsArray); $i++)
        {
            if(isset($data[$i])) $values .= ", {$data[$i]}";
            else $values .= ", ";
        }

        if($values === "")
            throw new Exception("No values passed, cannot insert");

        $values = substr($values, 1);

        return "INSERT INTO {$this->dbName} ({$this->selectors}) VALUES ({$values})";
    }

    // function for updating selected data
    // updates everything from given array
    // returns string with sql query
    public function buildUpdate(string $id, array $data): string
    {
        if($data === [])
            throw new Exception("No data passed to update function");

        $selectorsArray = explode(", ", $this->selectors);
        if(count($data) > count($selectorsArray))
            throw new Exception("Too much data passed to update function");

        $values = "";
        foreach ($data as $param => $value)
        {
            if(in_array($param ,$selectorsArray)) $values .= ", {$param} = {$value}";
            else throw new Exception("Badly chosen selector param -> {$param} with value -> {$value}");
        }
        $values = substr($values, 1);

        return "UPDATE {$this->dbName} SET {$values} WHERE id = {$id}";
    }

    // function for deleting rows in database
    // delete row when id is given, if id is null then delete whole table if function prepareDeleteAll() is called before
    // returns string with sql query
    public function buildDelete(string $id = null)
    {
        if($id !== null) return "DELETE FROM {$this->dbName} WHERE id = {$id}";
        else if($this->deleteAll) return "TRUNCATE {$this->dbName}";
        else throw new Exception("No id given");
    }

    // auxiliary function to prevet deleting everything when it is not needed
    // function sets variable deleteAll to TRUE, then buildDelete function can delete everything when id is not given
    // returns void
    public function prepareDeleteAll(): void
    {
        $this->deleteAll = true;
    }


    //----------------------------------------------------------------------------------------
    // function for filling primary variables
    // is called automatically when object is created
    // returns void
    private function fill(): void
    {
        $this->selectors = $this->getSelectors();
        $this->dbName = $this->getDatabaseName();
    }

    // function for getting database name
    // function get database name based on entity name
    // returns string with database name
    private function getDatabaseName(): string
    {
        $dbName = get_class($this->entity);
        $tmpArray = explode("\\", $dbName);
        $dbName = $tmpArray[1];
        $dbName .= "s";
        $dbName = lcfirst($dbName);
        return $dbName;
    }

    // function for getting all selectors
    // function get database selectors based on entity setFunctions
    // returns string with all selectors name formatted for quick use in queries
    private function getSelectors(): string
    {
        $selectors = "";

        $classMethods = get_class_methods($this->entity); //get all methods name
        foreach ($classMethods as $methodName)
        {
            if(substr($methodName, 0, 3) === "set") //separate first 3 chars
            {
                if(method_exists($this->entity, $methodName))
                {
                    $methodPostfix = substr($methodName, 3);
                    $selectors .= ", ".lcfirst($methodPostfix);
                }
            }
        }

        if($selectors === "")
            throw new Exception("Badly chosen Entity, 0 existing selectors");

        $selectors = substr($selectors, 2, );
        return $selectors;
    }


}
