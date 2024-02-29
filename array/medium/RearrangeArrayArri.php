<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function printArr(array &$arr): void
{
    $size = sizeof($arr);
    $temp = array();
    for ($i = 0; $i < $size; $i++) {
        $temp[$i] = -1;
    }
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] != -1) {
            $temp[$arr[$i]] = $arr[$i];
        }
    }
    print_r($temp);
    echo "<br/>";
    for ($i = 0; $i < $size; $i++) {
        $arr[$i] = $temp[$i];
    }
}

$arr = [-1, -1, 6, 1, 9, 3, 2, -1, 4, -1];
printArr($arr);
print_r($arr);
