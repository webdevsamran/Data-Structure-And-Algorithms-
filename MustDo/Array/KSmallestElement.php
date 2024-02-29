<?php

function kthSmallest($arr, $n, $k){
    $maxHeap = new SplMaxHeap;
    for($i = 0; $i < $n; $i++){
        $maxHeap->insert($arr[$i]);
    }
    while($k--){
        $maxHeap->extract();
    }
    return $maxHeap->top();
}

$N = 6;
$K = 3;
$arr = [7, 10, 4, 3, 20, 15];

echo kthSmallest($arr,$N,$K);