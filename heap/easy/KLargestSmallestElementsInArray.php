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
    if ($left < $size && $arr[$left] > $arr[$largest]) {
        $largest = $left;
    }
    if ($right < $size && $arr[$right] > $arr[$largest]) {
        $largest = $right;
    }
    if ($largest != $i) {
        swap($arr[$largest], $arr[$i]);
        heapify($arr, $largest, $size);
    }
}

// function insertIntoHeap(&$arr, $val): void
// {
//     array_push($arr, $val);
//     makeMaxHeap($arr);
// }

// function updateNode(&$arr, $index, $val): void
// {
//     $arr[$index] = $val;
//     makeMaxHeap($arr);
// }

// function deleteNode(&$arr, $val): void
// {
//     $size = sizeof($arr);
//     for ($i = 0; $i < $size; $i++) {
//         if ($arr[$i] == $val) {
//             break;
//         }
//     }
//     swap($arr[$i], $arr[$size - 1]);
//     array_pop($arr);
//     $size = sizeof($arr);
//     for ($i = ($size / 2); $i >= 0; $i--) {
//         heapify($arr, $i, $size);
//     }
// }

function makeMaxHeap(&$arr): void
{
    $size = sizeof($arr);
    for ($i = ($size / 2) - 1; $i >= 0; $i--) {
        heapify($arr, $i, $size);
    }
}

function heapSort(&$arr): void
{
    makeMaxHeap($arr);
    for ($i = (sizeof($arr) - 1); $i > 0; $i--) {
        swap($arr[0], $arr[$i]);
        heapify($arr, 0, $i);
    }
    $arr = array_reverse($arr);
}

function printMaxHeap($arr): void
{
    $size = sizeof($arr);
    echo "Max Heap is: ";
    for ($i = 0; $i < $size; $i++) {
        echo $arr[$i] . " ";
    }
    echo ".<br/>";
}

function printKLargestElements($arr, $k): void
{
    echo "Kth Largest Elements in Max Heap are: ";
    for ($i = 0; $i < $k; $i++) {
        echo $arr[$i] . " ";
    }
    echo ".<br/>";
}

function printKSmallestElements($arr, $k): void
{
    $size = sizeof($arr);
    $till = $size - $k;
    echo "Kth Smallest Elements in Max Heap are: ";
    for ($i = $size - 1; $i >= $till; $i--) {
        echo $arr[$i] . " ";
    }
    echo ".<br/>";
}

$arr = array(1, 23, 12, 9, 30, 2, 50);
makeMaxHeap($arr);
printMaxHeap($arr);
heapSort($arr);
printMaxHeap($arr);
printKLargestElements($arr, 2);
printKSmallestElements($arr, 2);
