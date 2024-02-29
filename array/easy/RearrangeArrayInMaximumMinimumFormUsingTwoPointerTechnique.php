<?php

function bubbleSort(array &$arr): void
{
    $size = sizeof($arr);
    $is_swapped = false;
    for ($i = 0; $i < $size - 1; $i++) {
        for ($j = $i + 1; $j < $size; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                $is_swapped = true;
            }
        }
        if (!$is_swapped) {
            return;
        }
    }
}

function reArrange(array &$arr): void
{
    bubbleSort($arr);
    $low = 0;
    $high = sizeof($arr) - 1;
    $temp = array();
    while ($low <= $high) {
        array_push($temp, $arr[$high]);
        array_push($temp, $arr[$low]);
        $high--;
        $low++;
    }
    for ($i = 0; $i < sizeof($arr); $i++) {
        $arr[$i] = $temp[$i];
    }
}

$arr = [1, 2, 3, 4, 5, 6, 7];
reArrange($arr);
print_r($arr);
