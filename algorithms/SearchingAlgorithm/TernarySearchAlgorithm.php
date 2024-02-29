<?php

function ternarySearch($arr, $key): int
{
    sort($arr, SORT_ASC);
    $size = sizeof($arr);
    $low = 0;
    $high = $size - 1;
    while ($low <= $high) {
        $mid1 = (int)($low + ($high - $low) / 2);
        $mid2 = (int)($high - ($high - $low) / 2);
        if ($arr[$mid1] == $key) {
            return $mid1;
        } else if ($arr[$mid2] == $key) {
            return $mid2;
        } else if ($arr[$mid1] > $key) {
            $high = $mid1 - 1;
        } else if ($arr[$mid2] < $key) {
            $low = $mid2 + 1;
        } else {
            $low = $mid1 + 1;
            $high = $mid2 - 1;
        }
    }
    return -1;
}

$arr = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610];
$key = 55;
$index = ternarySearch($arr, $key);
if ($index == -1) {
    echo "Key doesn't exists";
} else {
    echo "Key exists at index " . $index;
}
