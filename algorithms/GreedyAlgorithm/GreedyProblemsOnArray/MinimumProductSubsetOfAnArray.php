<?php

function minProductSubset($arr, $size): int
{
    if ($size == 1) {
        return $arr[0];
    }
    $max_neg = PHP_INT_MIN;
    $min_pos = PHP_INT_MAX;
    $count_neg = 0;
    $count_zero = 0;
    $prod = 1;

    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] == 0) {
            $count_zero++;
            continue;
        }
        if ($arr[$i] < 0) {
            $count_neg++;
            $max_neg = max($max_neg, $arr[$i]);
        }
        if ($arr[$i] > 0) {
            $min_pos = min($min_pos, $arr[$i]);
        }
        $prod = $prod * $arr[$i];
    }

    if ($count_zero == $size || ($count_neg == 0 && $count_zero > 0)) {
        return 0;
    }

    if ($count_neg == 0) {
        return $min_pos;
    }

    if ($count_neg != 0 && !($count_neg & 1)) {
        $prod = (int)($prod / $max_neg);
    }

    return $prod;
}

$a = [-1, -1, -2, 4, 3];
$n = sizeof($a);
echo minProductSubset($a, $n);
