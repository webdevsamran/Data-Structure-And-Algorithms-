<?php

function printKMax($arr,$n,$k){
    $maxHeap = new SplMaxHeap;
    for($i = 0; $i < $k; $i++){
        $maxHeap->insert($arr[$i]);
    }
    echo $maxHeap->top() . " ";
    for($i = 1; $i <= $n - $k; $i++){
        if($maxHeap->top() == $arr[$i-1]){
            $maxHeap->extract();
        }
        $maxHeap->insert($arr[$i - 1 + $k]);
        echo $maxHeap->top() . " ";
    }
}

$arr = [ 12, 1, 78, 90, 57, 89, 56 ];
$N = sizeof($arr);
$K = 3;

printKMax($arr, $N, $K);