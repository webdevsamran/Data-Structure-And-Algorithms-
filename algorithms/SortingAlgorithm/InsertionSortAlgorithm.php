<?php

function insertionSort(array &$arr): void
{
    $size = sizeof($arr);
    for ($step = 1; $step < $size; $step++) {
        $key = $arr[$step];
        $j = $step - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            --$j;
        }
        $arr[$j + 1] = $key;
    }
}

$arr = [54, 12, 656, 2, 3, 1, 0, 76, 323];
insertionSort($arr);
print_r($arr);
