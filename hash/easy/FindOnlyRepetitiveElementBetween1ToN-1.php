<?php

function findOnlyRepetitive($arr): int
{
    $count = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if (!array_key_exists($arr[$i], $count)) {
            $count[$arr[$i]] = 1;
        } else {
            return $arr[$i];
        }
    }
    return NULL;
}

$arr = [9, 8, 2, 6, 1, 8, 5, 3, 4, 7];
echo findOnlyRepetitive($arr) . " is the Only Repetative Element";
