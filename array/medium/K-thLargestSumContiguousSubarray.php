<?php

function kthLargestSum(array &$arr, $k): void
{
    $size = sizeof($arr);
    $sum = array();
    $sum[0] = 0;
    $sum[1] = $arr[0];
    $Q = new SplMaxHeap();
    for ($i = 2; $i <= $size; $i++) {
        $sum[$i] = $sum[$i - 1] + $arr[$i - 1];
    }
    print_r($sum);
    echo "<br/>";
    for ($i = 1; $i < $size; $i++) {
        for ($j = $i; $j < $size; $j++) {
            $x = $sum[$j] - $sum[$i - 1];
            if ($Q->count() < $k) {
                $Q->insert($x);
            } else {
                if ($Q->top() < $x) {
                    $Q->extract();
                    $Q->insert($x);
                }
            }
        }
    }
    echo $Q->top();
}

$arr = [10, -10, 20, -40];
kthLargestSum($arr, 6);
