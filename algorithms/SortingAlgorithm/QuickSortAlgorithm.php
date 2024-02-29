<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function partition($arr, $low, $high): int
{
    $pivot = $arr[$high];
    $i = $low - 1;
    for ($j = $low; $j < $high; $j++) {
        if ($arr[$j] <= $pivot) {
            $i++;
            swap($arr[$i], $arr[$j]);
        }
    }
    swap($arr[$i + 1], $arr[$high]);
    return $i + 1;
}

function quickSort($arr, $low, $high): void
{
    if ($low < $high) {
        $pi = partition($arr, $low, $high);
        quickSort($arr, $low, $pi - 1);
        quickSort($arr, $pi + 1, $high);
    }
}

$arr = [54, 12, 656, 2, 3, 1, 0, 76, 323];
$size = sizeof($arr);
quickSort($arr, 0, $size - 1);
print_r($arr);
