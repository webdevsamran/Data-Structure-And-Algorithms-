<?php

function jumpSearch($arr, $key): int
{
    $size = sizeof($arr);
    $step = sqrt($size);
    $prev = 0;
    $walk = 1;
    if ($arr[0] == $key) {
        return 0;
    }
    while ($arr[min($walk, $size) - 1] < $key) {
        $prev = $walk;
        $walk += $step;
        if ($prev > $size) {
            return -1;
        }
    }
    while ($arr[$prev] < $key) {
        $prev++;
        if ($prev == min($walk, $size)) {
            return -1;
        }
    }
    if ($arr[$prev] == $key) {
        return $prev;
    }
    return -1;
}

$arr = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610];
$key = 1;
$index = jumpSearch($arr, $key);
if ($index == -1) {
    echo "Key doesn't exists";
} else {
    echo "Key exists at index " . $index;
}
