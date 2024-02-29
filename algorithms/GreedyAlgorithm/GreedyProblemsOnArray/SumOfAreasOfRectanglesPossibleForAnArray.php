<?php

function MaxTotalRectangleArea($arr, $size): int
{
    sort($arr, SORT_DESC);
    $sum = 0;
    $flag = false;
    $len = NULL;

    for ($i = 0; $i < $size; $i++) {
        if ((($arr[$i] == $arr[$i + 1]) || ($arr[$i] - $arr[$i + 1] == 1)) && !$flag) {
            $flag = true;
            $len = $arr[$i + 1];
            $i++;
        } else if ((($arr[$i] == $arr[$i + 1]) || ($arr[$i] - $arr[$i + 1] == 1)) && $flag) {
            $flag = false;
            $sum = $sum + ($arr[$i + 1] * $len);
            $i++;
        }
    }

    return $sum;
}

$a = [10, 10, 10, 10, 11, 10, 11, 10, 9, 9, 8, 8];
$n = sizeof($a);
echo MaxTotalRectangleArea($a, $n);
