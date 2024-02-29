<?php

function print2ndLargest(array $arr): void
{
    $size = sizeof($arr);
    $first = PHP_INT_MIN;
    $second = PHP_INT_MIN;
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] > $first) {
            $second = $first;
            $first = $arr[$i];
        } else if ($arr[$i] > $second && $arr[$i] != $first) {
            $second = $arr[$i];
        }
    }
    echo "2nd Largest Element is: " . $second;
}

$arr = [1, 2, 3, 4, 5, 56, 78, 99, 0, 100];
print2ndLargest($arr);
