<?php

function binarySearch($arr, $key): int
{
    sort($arr, SORT_ASC);
    $size = sizeof($arr);
    $low = 0;
    $high = $size - 1;
    while ($low <= $high) {
        $mid = (int)($low + (($high - $low) / 2));
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

$arr = [5, 15, 6, 9, 4];
$key = 15;
$index = binarySearch($arr, $key);
if ($index == -1) {
    echo "Key doesn't exists";
} else {
    echo "Key exists at index " . $index;
}
