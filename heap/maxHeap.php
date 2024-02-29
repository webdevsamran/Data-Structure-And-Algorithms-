<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function heapify(&$arr, $i): void
{
    $largest = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    $size = sizeof($arr);
    if ($left < $size && $arr[$left] > $arr[$largest]) {
        $largest = $left;
    }
    if ($right < $size && $arr[$right] > $arr[$largest]) {
        $largest = $right;
    }
    if ($largest != $i) {
        swap($arr[$largest], $arr[$i]);
        heapify($arr, $largest);
    }
}

function insertIntoHeap(&$arr, $val): void
{
    array_push($arr, $val);
    makeMaxHeap($arr);
}

function updateNode(&$arr, $index, $val): void
{
    $arr[$index] = $val;
    makeMaxHeap($arr);
}

function deleteNode(&$arr, $val): void
{
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] == $val) {
            break;
        }
    }
    swap($arr[$i], $arr[$size - 1]);
    array_pop($arr);
    for ($i = ($size / 2); $i >= 0; $i--) {
        heapify($arr, $i);
    }
}

function makeMaxHeap(&$arr): void
{
    $size = sizeof($arr);
    for ($i = ($size / 2) - 1; $i >= 0; $i--) {
        heapify($arr, $i);
    }
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

$arr = array();
insertIntoHeap($arr, 4);
insertIntoHeap($arr, 1);
insertIntoHeap($arr, 7);
insertIntoHeap($arr, 9);
insertIntoHeap($arr, 10);
printMaxHeap($arr);
updateNode($arr, 1, 5);
printMaxHeap($arr);
deleteNode($arr, 5);
printMaxHeap($arr);
