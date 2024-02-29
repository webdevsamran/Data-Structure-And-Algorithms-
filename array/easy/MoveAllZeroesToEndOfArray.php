<?php

function moveAllZeros(array &$arr): void
{
    $size = sizeof($arr);
    $count = 0;
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] == 0) {
            $count++;
            unset($arr[$i]);
        }
    }
    for ($i = 0; $i < $count; $i++) {
        array_push($arr, 0);
    }
    array_values($arr);
}

$arr = [1, 2, 0, 4, 3, 0, 5, 0];
moveAllZeros($arr);
print_r($arr);
