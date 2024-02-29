<?php

function maximumSum($arr, $n, $k): int
{
    $sum = 0;
    $i = 0;
    sort($arr);

    while ($k > 0) {
        if ($arr[$i] > 0) {
            $k = 0;
        } else {
            $arr[$i] = -1 * $arr[$i];
            $k--;
        }
        $i++;
    }

    for ($i = 0; $i < $n; $i++) {
        $sum += $arr[$i];
    }

    return $sum;
}

$arr = [-2, 0, 5, -1, 2];
$k = 4;
$n = sizeof($arr);
echo maximumSum($arr, $n, $k);
