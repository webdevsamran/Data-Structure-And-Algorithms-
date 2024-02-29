<?php

function sortK(&$arr,$n,$k){
    $size = ($n == $k) ? $k : $k + 1;
    $pq = new SplMinHeap;
    for($i = 0; $i <= $k; $i++){
        $pq->insert($arr[$i]);
    }
    $index = 0;
    for($i = $k + 1; $i < $n; $i++){
        $arr[$index++] = $pq->extract();
        $pq->insert($arr[$i]);
    }
    while(!$pq->isEmpty()){
        $arr[$index++] = $pq->extract();
    }
}

$k = 3;
$arr = [ 2, 6, 3, 12, 56, 8 ];
$n = sizeof($arr);

sortK($arr, $n, $k);

print_r($arr);