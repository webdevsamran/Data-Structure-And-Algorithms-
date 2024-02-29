<?php

function kthSmallest($arr,$n,$k){
    $pq = new SplMaxHeap;
    for($i = 0; $i < $n; $i++){
        $pq->insert($arr[$i]);
    }
    for($i = $k; $i < $n; $i++){
        if($arr[$i] < $pq->top()){
            $pq->extract();
            $pq->insert($arr[$i]);
        }
    }
    return $pq->top();
}

$N = 10;
$arr = [ 10, 5, 4, 3, 48, 6, 2, 33, 53, 10 ];
$K = 4;
echo "Kth Smallest Element is: " . kthSmallest($arr, $N, $K);