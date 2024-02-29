<?php

function printPre($heap){
    echo "<pre>";
    print_r($heap);
    echo "</pre>";
}

function kthLargest($k,$arr,$n){
    $ans = array();
    $pq = new SplMinHeap;
    for($i = 0; $i < $n; $i++){
        if($pq->count() < $k){
            $pq->insert($arr[$i]);
        }else{
            if($arr[$i] > $pq->top()){
                $pq->extract();
                $pq->insert($arr[$i]);
            }
        }
        if($pq->count() < $k){
            $ans[$i] = -1;
        }else{
            $ans[$i] = $pq->top();
        }
    }
    return $ans;
}

$n = 6;
$arr = [ 1, 2, 3, 4, 5, 6 ];
$k = 4;

$v = kthLargest($k, $arr, $n);
foreach($v as $val)
    echo $val . " ";