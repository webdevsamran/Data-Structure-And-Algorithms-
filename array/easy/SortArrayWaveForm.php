<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function bubbleSort(array &$arr): void
{
    $size = sizeof($arr);
    $is_swapped = false;
    for ($i = 0; $i < $size - 1; $i++) {
        for ($j = $i + 1; $j < $size; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $is_swapped = true;
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
        if (!$is_swapped) {
            return;
        }
    }
}

function sortWaveForm(array &$arr): void
{
    bubbleSort($arr);
    $size = sizeof($arr);
    for ($i = 0; $i < $size - 1; $i += 2) {
        swap($arr[$i], $arr[$i + 1]);
    }
}

$arr = [3, 9, 6, 1, 2, 5, 7];
sortWaveForm($arr);
print_r($arr);
