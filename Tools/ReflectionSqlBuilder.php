<?php

namespace Tools;

use Exception;

class ReflectionSqlBuilder
{
    private object $entity;
    private string $selectors = "";
    private string $tableName = "";
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
        return "SELECT {$this->selectors} FROM {$this->tableName}".($id === null ? "" : " WHERE id = {$id}");
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
            else throw new Exception("Selector {$param} does not exist in entity {$this->tableName}");
        }
        if($searchParameters === "")
            throw new Exception("No selectors chosen!");
        $searchParameters = substr($searchParameters, 4);
        return "SELECT {$this->selectors} FROM {$this->tableName} WHERE {$searchParameters}";
    }

    // function for inserting everything in chosen database based on nothing
    // inserting everything from entity
    // returns string with sql query
    public function buildInsert(): string
    {
        $values = "";
        $classGetters = $this->getClassGetMethods();
        $tmpSelectors = explode(", ",$this->selectors);
        $tmpSelectors = array_slice($tmpSelectors, 0, (count($tmpSelectors) - 1));
        $selectorsFinal = "";
        foreach ($tmpSelectors as $item) $selectorsFinal .= ", {$item}";
        $selectorsFinal = substr($selectorsFinal, 1);

        foreach ($classGetters as $method)
        {
            if($method !== "getId")
            {
                $values .= ", '{$this->entity->$method()}'";
            }
        }

        $values = substr($values, 1);
        return "INSERT INTO {$this->tableName} ({$selectorsFinal}) VALUES ({$values})";
    }

    // function for updating selected data
    // updates everything from given array
    // returns string with sql query
    public function buildUpdate(string $id, array $selectors): string
    {
        $classGetters = $this->getClassGetMethods();
        $values = "";
        $counter = 0;
        foreach ($classGetters as $method)
        {
            $tmp = substr($method, 3);
            $tmp = lcfirst($tmp);
            if(in_array($tmp ,$selectors)){
                $values .= ", {$tmp} = '{$this->entity->$method()}'";
            }
            $counter++;
        }
        $values = substr($values, 1);
        return "UPDATE {$this->tableName} SET {$values} WHERE id = {$id}";
    }

    // function for deleting rows in database
    // delete row when id is given, if id is null then delete whole table if function prepareDeleteAll() is called before
    // returns string with sql query
    public function buildDelete(int $id = null)
    {
        if($id !== null) return "DELETE FROM {$this->tableName} WHERE id = '{$id}'";
        else if($this->deleteAll) return "TRUNCATE {$this->tableName}";
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
        $this->tableName = $this->getTableName();
    }

    // function for getting table name
    // function get table name based on entity name
    // returns string with table name
    private function getTableName(): string
    {
        $tableName = get_class($this->entity);
        $tmpArray = explode("\\", $tableName);
        $tableName = $tmpArray[1];
        $tableName .= "s";
        $tableName = lcfirst($tableName);
        return $tableName;
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

    private function getClassGetMethods(): array
    {
        $classMethods = get_class_methods($this->entity);
        foreach ($classMethods as $methodName)
        {
            if(substr($methodName, 0, 3) === "get") $classGetters[] = $methodName;
        }
        return $classGetters;
    }


}
