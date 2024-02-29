<?php

function print3Largest(array $arr): void
{
    $size = sizeof($arr);
    $first = PHP_INT_MIN;
    $second = PHP_INT_MIN;
    $third = PHP_INT_MIN;
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] > $first) {
            $third = $second;
            $second = $first;
            $first = $arr[$i];
        } else if ($arr[$i] > $second && $arr[$i] != $first) {
            $third = $second;
            $second = $arr[$i];
        } else if ($arr[$i] > $third && $arr[$i] != $second) {
            $third = $arr[$i];
        }
    }
    echo "Top 3 Largest Elements are:- " . $first . " ," . $second . " ," . $third . ".";
}

$arr = [1, 2, 3, 4, 5, 56, 78, 99, 0, 100];
print3Largest($arr);
