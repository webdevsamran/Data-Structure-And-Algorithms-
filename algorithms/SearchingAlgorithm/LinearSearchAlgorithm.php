<?php

function linearSearch($arr, $key): int
{
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] == $key) {
            return $i;
        }
    }
    return -1;
}

$arr = [5, 15, 6, 9, 4];
$key = 4;
$index = linearSearch($arr, $key);
if ($index == -1) {
    echo "Key doesn't exists";
} else {
    echo "Key exists at index " . $index;
}
