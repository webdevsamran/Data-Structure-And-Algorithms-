<?php

function selectionSort(array &$arr): void
{
    $size = sizeof($arr);
    for ($step = 0; $step < $size - 1; $step++) {
        $idx = $step;
        for ($i = $step + 1; $i < $size; $i++) {
            if ($arr[$i] < $arr[$idx]) {
                $idx = $i;
            }
        }
        if ($idx != $step) {
            $temp = $arr[$idx];
            $arr[$idx] = $arr[$step];
            $arr[$step] = $temp;
        }
    }
}

$arr = [12, 34, 6, 7, 1, 2, 90, 76, 56, 76];
selectionSort($arr);
print_r($arr);
