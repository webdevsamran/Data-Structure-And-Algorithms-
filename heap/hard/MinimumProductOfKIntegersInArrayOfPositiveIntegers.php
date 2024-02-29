<?php

function minProduct($arr,$n,$k){
    $pq = new SplMinHeap;
    $result = 1;
    $count = 0;
    for($i = 0; $i < $n; $i++){
        $pq->insert($arr[$i]);
    }
    while(!$pq->isEmpty() && $count < $k){
        $top = $pq->extract();
        $result *= $top;
        $count++;
    }
    return $result;
}

$arr = [ 198, 76, 544, 123, 154, 675 ];
$k = 2;
$n = sizeof($arr);
echo "Minimum product is " . minProduct($arr, $n, $k);