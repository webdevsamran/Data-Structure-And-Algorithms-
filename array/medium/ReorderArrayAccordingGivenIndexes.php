<?php

function reorder(array &$arr, array &$ind): void
{
    $size = sizeof($arr);
    $temp = array();
    for ($i = 0; $i < $size; $i++) {
        $temp[$ind[$i]] = $arr[$i];
    }
    for ($i = 0; $i < $size; $i++) {
        $arr[$i] = $temp[$i];
        $ind[$i] = $i;
    }
}

$arr = [50, 40, 70, 60, 90];
$ind = [3,  0,  4,  1,  2];
reorder($arr, $ind);
print_r($arr);
echo "<br/>";
print_r($ind);
