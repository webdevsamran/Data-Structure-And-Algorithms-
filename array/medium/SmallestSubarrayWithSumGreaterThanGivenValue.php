<?php

function smallestSubWithSum(array $arr, $key): int
{
    $size = sizeof($arr);
    $min_len = $size + 1;
    $curr_sum = 0;
    $start = 0;
    $end = 0;
    while ($end < $size) {
        while ($curr_sum <= $key && $end < $size) {
            $curr_sum += $arr[$end];
            $end++;
        }
        while ($curr_sum > $key && $start < $size) {
            if ($end - $start < $min_len) {
                $min_len = $end - $start;
            }
            $curr_sum -= $arr[$start];
            $start++;
        }
    }
    return $min_len;
}

$arr = [1, 4, 45, 6, 10, 19];
$key = 51;
echo smallestSubWithSum($arr, $key);
