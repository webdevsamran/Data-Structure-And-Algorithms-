<?php

function algorithmSearch($arr, $key): int
{
    $size = sizeof($arr);
    $low = 0;
    $high = $size - 1;
    while ($low <= $high && $key >= $arr[$low] && $key <= $arr[$high]) {
        $pos = $low + ($key - $arr[$low]) * ((int)($high - $low) / ($arr[$high] - $arr[$low]));
        if ($arr[$pos] == $key) {
            return $pos;
        } else if ($arr[$pos] > $key) {
            $high = $pos - 1;
        } else {
            $low = $pos + 1;
        }
    }
    return -1;
}

$arr = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610];
$key = 144;
$index = algorithmSearch($arr, $key);
if ($index == -1) {
    echo "Key doesn't exists";
} else {
    echo "Key exists at index " . $index;
}
