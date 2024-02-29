<?php

function exponentialSearch($arr, $size, $key): int
{
    if ($arr[0] == $key) {
        return 0;
    }
    $i = 1;
    while ($arr[$i] < $key && $i < $size) {
        $i = $i * 2;
    }
    return binarySearch($arr, $i / 2, min($i, $size - 1), $key);
}

function binarySearch($arr, $low, $high, $key): int
{
    while ($low <= $high) {
        $mid = (int)($low + ($high - $low) / 2);
        if ($arr[$mid] == $key) {
            return $mid;
        } else if ($arr[$mid] > $key) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return -1;
}

$arr = [2, 3, 4, 10, 40];
$size = sizeof($arr);
$x = 10;
$result = exponentialSearch($arr, $size, $x);
echo ($result == -1) ? "Element is not present in array" : "Element is present at index " . $result;
