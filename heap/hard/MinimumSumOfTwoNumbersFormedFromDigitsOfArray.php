<?php

function minSum($arr,$n){
    $pq = new SplMinHeap;
    $num1 = $num2 = NULL;
    for($i = 0; $i < $n; $i++){
        $pq->insert($arr[$i]);
    }
    while(!$pq->isEmpty()){
        $num1 = $num1 * 10 + $pq->extract();
        if(!$pq->isEmpty()){
            $num2 = $num2 * 10 + $pq->extract();
        }
    }
    return $num1 + $num2;
}

$arr = [6, 8, 4, 5, 2, 3];
$n = sizeof($arr);
echo minSum($arr, $n);