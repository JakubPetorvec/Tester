<?php

namespace Tools\QueryBuilder;

class QueryBuilder
{
    public static function select(string ...$select): Select
    {
        return new Select($select);
    }

    //insert

    //update

    public static function delete(string $table): Delete
    {
        return new Delete($table);
    }
}
