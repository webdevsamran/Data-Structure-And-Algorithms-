<?php

function DecreasingArray($arr, $size): int
{
    $sum = 0;
    $min_heap = new SplMinHeap;

    for ($i = 0; $i < $size; $i++) {
        if (!$min_heap->isEmpty() && $min_heap->top() < $arr[$i]) {
            $diff = $arr[$i] - $min_heap->extract();
            $sum += $diff;
            $min_heap->insert($arr[$i]);
        }
        $min_heap->insert($arr[$i]);
    }

    return $sum;
}

$a = [3, 1, 2, 1];
$n = sizeof($a);
echo DecreasingArray($a, $n);
