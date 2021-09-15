<?php

namespace SQLBuilders;

class TestSQLBuilder
{
    public function buildGetAll() :string
    {
        return "SELECT * FROM tests";
    }
}
