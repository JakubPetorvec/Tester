<?php

namespace Tools;

abstract class ReflectionMapper
{
    public static function map(object $parser, $data): Object
    {
        $classMethods = get_class_methods($parser); //get all methods name
        foreach ($classMethods as $methodName)
        {
            if(substr($methodName, 0, 3) === "set") //separate first 3 chars
            {
                if(method_exists($parser, $methodName))
                {
                    $methodPostfix = substr($methodName, 3);
                    $postDataName = lcfirst($methodPostfix);
                    if(isset($data["$postDataName"]))
                    {
                        $parser->$methodName($data["$postDataName"]);
                    }
                }
            }
        }
        return $parser;
    }
}
