<?php

function rightRotate(array &$arr, $rotation_size): void
{
    $size = sizeof($arr);
    $startsFrom = $size - $rotation_size;
    $k = 0;
    $temp = array();
    for ($i = $startsFrom; $i < $size; $i++) {
        $temp[$k] = $arr[$i];
        $k++;
    }
    for ($i = 0; $i < $startsFrom; $i++) {
        $temp[$k] = $arr[$i];
        $k++;
    }
    for ($i = 0; $i < $size; $i++) {
        $arr[$i] = $temp[$i];
    }
}

$arr = [1, 2, 3, 4, 5, 6, 7];
$rotation_size = 2;
rightRotate($arr, $rotation_size);
print_r($arr);
