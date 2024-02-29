<?php

function isHeap(&$arr, $index, $size): bool
{
    if ($index >= ($size - 1) / 2) {
        return true;
    }
    if ($arr[$index] >= $arr[2 * $index + 1] && $arr[$index] >= $arr[2 * $index + 2] && isHeap($arr, 2 * $index + 1, $size) && isHeap($arr, 2 * $index + 2, $size)) {
        return true;
    }
    return false;
}

$arr = [90, 15, 10, 7, 12, 2, 7, 3];
$size = sizeof($arr);

if (isHeap($arr, 0, $size))
    echo "Given Array is a Heap.<br/>\n";
else
    echo "Given Array is not a Heap.<br/>\n";
