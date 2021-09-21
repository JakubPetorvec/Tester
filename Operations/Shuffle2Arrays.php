<?php

namespace Operations;

class Shuffle2Arrays
{
    function shuffle2arrays(&$array1, &$array2)
    {
        $usedValues = [];
        $newArray1 = [];
        $newArray2 = [];
        for($i = 0; $i < count($array1);)
        {
            $randomValue = rand(0, (count($array1) - 1));
           if(!in_array($randomValue, $usedValues))
           {
               array_push($usedValues, $randomValue);
               $newArray1[$randomValue] = $array1[$i];
               $newArray2[$randomValue] = $array2[$i];
               $i++;
           }
        }
        ksort($newArray1);
        ksort($newArray2);
        $array1 = $newArray1;
        $array2 = $newArray2;
    }
}
