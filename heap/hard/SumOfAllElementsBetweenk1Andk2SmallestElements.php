<?php

function sumBetweenTwoKth($arr,$n,$k1,$k2){
    $pq = new SplMaxHeap;
    for($i = 0; $i < $n; $i++){
        $pq->insert($arr[$i]);
        if($pq->count() > $k2){
            $pq->extract();
        }
    }
    $pq->extract();
    $ans = 0;
    while($pq->count() > $k1){
        $ans += $pq->extract();
    }
    return $ans;
}

$arr = [ 20, 8, 22, 4, 12, 10, 14 ];
$k1 = 3;
$k2 = 6;
$n = sizeof($arr);
echo sumBetweenTwoKth($arr, $n, $k1, $k2);