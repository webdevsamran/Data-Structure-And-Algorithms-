<?php

function printLargest($seq,$n){
    $res = array();
    $pq = new SplMaxHeap;
    for($i = 0; $i < $n; $i++){
        $pq->insert($seq[$i]);
    }
    for($i = 0; $i < $n; $i++){
        $d = $pq->extract();
        if($d != $seq[$i] || $i == $n - 1){
            $res[$i] = $d;
        }else{
            $res[$i] = $pq->extract();
            $pq->insert($d);
        }
    }
    if($res[$n-1] == $seq[$n-1]){
        $res[$n-1] = $res[$n-2];
        $res[$n-2] = $seq[$n-1];
    }
    print_r($res);
}

$seq = [ 92, 3, 52, 13, 2, 31, 1 ];
$n = sizeof($seq);
printLargest($seq, $n);