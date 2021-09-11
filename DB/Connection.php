<?php

namespace DB;

use mysqli;

class Connection
{
    private mysqli $connection;

    public function connect(): bool
    {
        $this->connection = mysqli_connect('localhost', 'root', '','tester');
        if(!$this->connection) {
            echo ("Connection failed: " . mysqli_connect_error());
            return false;
        }
        else{ return true; }
    }

    public function insert(string $sql)
    {
        if(!mysqli_query($this->connection, $sql)){
            echo "Error with inserting ".mysqli_error($this->connection);
            return 0;
        }
        return mysqli_insert_id($this->connection);
    }

    public function update(string $sql){
        if(!mysqli_query($this->connection, $sql)){
            echo "Error with updating ".mysqli_error($this->connection);
        }
    }

    public function getAll(string $sql): array
    {
        $result = mysqli_query($this->connection, $sql);
        $data = [];
        if ($result !== false)
        {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete(string $sql): bool
    {
        $result = mysqli_query($this->connection, $sql);
        if($result !== false)
        {
            return false;
        }
        return true;
    }
}