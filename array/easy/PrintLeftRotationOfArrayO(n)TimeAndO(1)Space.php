<?php

function printLeftRotation(array &$arr, int $rotation_size): void
{
    $size = sizeof($arr);
    $mod = $rotation_size % $size;
    for ($i = 0; $i < $size; $i++) {
        echo $arr[($mod + $i) % $size] . ", ";
    }
    echo "<br/>";
}

$arr = [1, 3, 5, 7, 9];
printLeftRotation($arr, 2);
