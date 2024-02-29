<?php

function search(array &$arr, int $low, int $high, int $key): int
{
    if ($low > $high) {
        return -1;
    }
    $mid = (int)($low + ($high - $low) / 2);
    if ($arr[$mid] == $key) {
        return $mid;
    } else if ($arr[$low] <= $arr[$mid]) {
        if ($arr[$low] <= $key && $arr[$mid] >= $key) {
            return search($arr, $low, $mid - 1, $key);
        }
        return search($arr, $mid + 1, $high, $key);
    } else if ($arr[$mid] <= $key && $arr[$high] >= $key) {
        return search($arr, $mid + 1, $high, $key);
    }
    return search($arr, $low, $mid - 1, $key);
}

$arr = [4, 5, 6, 7, 8, 9, 1, 2, 3];
$size = sizeof($arr);
$i = search($arr, 0, $size - 1, 3);
if ($i != -1)
    echo "Index: " . $i;
else
    echo "Key not found";
