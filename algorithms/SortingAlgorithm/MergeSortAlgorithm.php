<?php

function merge(array &$arr, $low, $mid, $high): void
{
    $n1 = $mid - $low + 1;
    $n2 = $high - $mid;
    $leftArr = new SplFixedArray($n1);
    $rightArr = new SplFixedArray($n2);

    for ($i = 0; $i < $n1; $i++) {
        $leftArr[$i] = $arr[$low + $i];
    }
    for ($i = 0; $i < $n2; $i++) {
        $rightArr[$i] = $arr[$mid + $i + 1];
    }

    $i = 0;
    $j = 0;
    $k = $low;

    while ($i < $n1 && $j < $n2) {
        if ($leftArr[$i] <= $rightArr[$j]) {
            $arr[$k] = $leftArr[$i];
            $i++;
        } else {
            $arr[$k] = $rightArr[$j];
            $j++;
        }
        $k++;
    }
    while ($i < $n1) {
        $arr[$k] = $leftArr[$i];
        $i++;
        $k++;
    }
    while ($j < $n2) {
        $arr[$k] = $rightArr[$j];
        $j++;
        $k++;
    }
}

function mergeSort(array &$arr, $low, $high): void
{
    if ($low < $high) {
        $mid = (int)($low + ($high - $low) / 2);
        mergeSort($arr, $low, $mid);
        mergeSort($arr, $mid + 1, $high);
        merge($arr, $low, $mid, $high);
    }
}

$arr = [54, 12, 656, 2, 3, 1, 0, 76, 323];
$size = sizeof($arr);
mergeSort($arr, 0, $size - 1);
print_r($arr);
