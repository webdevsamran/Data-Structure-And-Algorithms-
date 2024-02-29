<?php

function ifPossible($arr, $size): bool
{
    $temp = $arr;
    sort($temp);
    for ($i = 0; $i < $size; $i++) {
        if (!($temp[$i] == $arr[$i]) && !($temp[$i] == $arr[$size - $i - 1])) {
            return false;
        }
    }
    return true;
}

$arr = [1, 7, 6, 4, 5, 3, 2, 8];
$n = sizeof($arr);
if (ifPossible($arr, $n))
    echo "Yes";
else
    echo "No";
