<?php

function leftRotate(array &$arr, $rotation_size): void
{
    $temp = array();
    $k = 0;
    $size = sizeof($arr);
    for ($i = $rotation_size; $i < $size; $i++) {
        $temp[$k] = $arr[$i];
        $k++;
    }
    for ($i = 0; $i < $rotation_size; $i++) {
        $temp[$k] = $arr[$i];
        $k++;
    }
    for ($i = 0; $i < $size; $i++) {
        $arr[$i] = $temp[$i];
    }
}

$arr = [1, 2, 3, 4, 5, 6, 7];
$rotation_size = 3;
leftRotate($arr, $rotation_size);
print_r($arr);
