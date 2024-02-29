<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function buildMaxHeap(&$arr, $size): void
{
    for ($i = 1; $i < $size; $i++) {
        if ($arr[$i] > $arr[($i - 1) / 2]) {
            $j = $i;
            while ($arr[$j] > $arr[($j - 1) / 2]) {
                swap($arr[$j], $arr[($j - 1) / 2]);
                $j = ($j - 1) / 2;
            }
        }
    }
}

function heapSort(&$arr, $size): void
{
    buildMaxHeap($arr, $size);
    for ($i = $size - 1; $i > 0; $i--) {
        swap($arr[0], $arr[$i]);
        $j = 0;
        $index = NULL;
        do {
            $index = (2 * $j) + 1;
            if ($arr[$index] < $arr[$index + 1] && $index < $i - 1) {
                $index++;
            }
            if ($arr[$j] < $arr[$index] && $index < $i) {
                swap($arr[$j], $arr[$index]);
            }
            $j = $index;
        } while ($index < $i);
    }
}

$arr = array(10, 20, 15, 17, 9, 21);
$size = sizeof($arr);
heapSort($arr, $size);
print_r($arr);
