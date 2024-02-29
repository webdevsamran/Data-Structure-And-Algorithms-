<?php

function UpdateArray(array &$arr, int $left, int $right, int $value): void
{
    $size = sizeof($arr);
    for ($i = $left; $i <= $right && $i < $size; $i++) {
        $arr[$i] += $value;
    }
}

$arr = [10, 5, 20, 40];
UpdateArray($arr, 0, 1, 10);
print_r($arr);
