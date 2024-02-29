<?php

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

$arr = [10, 12, 14, 4, 6, 8];
bubbleSort($arr);
print_r($arr);
