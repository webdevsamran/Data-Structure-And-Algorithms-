<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function reArrange(array &$arr): void
{
    $size = sizeof($arr);
    for ($i = 1; $i < $size; $i++) {
        if ($i % 2 == 0) {
            if ($arr[$i] > $arr[$i - 1]) {
                swap($arr[$i], $arr[$i - 1]);
            }
        } else {
            if ($arr[$i] < $arr[$i - 1]) {
                swap($arr[$i], $arr[$i - 1]);
            }
        }
    }
}

$arr = [1, 3, 2, 2, 5];
reArrange($arr);
print_r($arr);
