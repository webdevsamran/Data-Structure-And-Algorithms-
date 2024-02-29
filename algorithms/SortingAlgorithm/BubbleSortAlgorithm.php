<?php

function bubbleSort(array &$arr): void
{
    $size = sizeof($arr);
    for ($step = 0; $step < $size - 1; $step++) {
        $swapped = false;
        for ($i = 0; $i < ($size - $step - 1); $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $temp;
                $swapped = true;
            }
        }
        if (!$swapped) {
            break;
        }
    }
}

$arr = [10, 15, 5, 4, 2, 8, 9, 12];
bubbleSort($arr);
print_r($arr);
