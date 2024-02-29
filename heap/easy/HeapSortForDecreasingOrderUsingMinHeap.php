<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function heapify(&$arr, $i, $size): void
{
    $largest = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    if ($left < $size && $arr[$left] < $arr[$largest]) {
        $largest = $left;
    }
    if ($right < $size && $arr[$right] < $arr[$largest]) {
        $largest = $right;
    }
    if ($largest != $i) {
        swap($arr[$largest], $arr[$i]);
        heapify($arr, $largest, $size);
    }
}

function makeMinHeap(&$arr): void
{
    $size = sizeof($arr);
    for ($i = ($size / 2) - 1; $i >= 0; $i--) {
        heapify($arr, $i, $size);
    }
}

function heapSort(&$arr): void
{
    makeMinHeap($arr);
    for ($i = (sizeof($arr) - 1); $i > 0; $i--) {
        swap($arr[0], $arr[$i]);
        heapify($arr, 0, $i);
    }
}

function printMinHeap($arr): void
{
    $size = sizeof($arr);
    echo "Heap is: ";
    for ($i = 0; $i < $size; $i++) {
        echo $arr[$i] . " ";
    }
    echo ".<br/>";
}

$arr = array(5, 3, 10, 1);
makeMinHeap($arr);
printMinHeap($arr);
heapSort($arr);
printMinHeap($arr);
