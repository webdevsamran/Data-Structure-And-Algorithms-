<?php

function maxDifference($arr, $size, $k): int
{
    sort($arr);
    $s1 = 0;
    $s2 = 0;
    $sum = 0;
    for ($i = 0; $i < $k; $i++) {
        $s1 += $arr[$i];
    }
    for ($i = $k; $i < $size; $i++) {
        $s2 += $arr[$i];
    }
    $sum = $s2 - $s1;
    return $sum;
}

$arr = [8, 4, 5, 2, 10];
$N = sizeof($arr);
$k = 2;
echo maxDifference($arr, $N, $k) . "<br/>";
