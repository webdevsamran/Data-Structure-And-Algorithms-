<?php

function kthLargest($k,$arr,$n){
    $ans = array();
    $minHeap = new SplMinHeap;
    for($i = 0; $i < $n; $i++){
        if($minHeap->count() < $k){
            $minHeap->insert($arr[$i]);
        }else{
            if($arr[$i] > $minHeap->top()){
                $minHeap->extract();
                $minHeap->insert($arr[$i]);
            }
        }
        if($minHeap->count() < $k){
            array_push($ans, -1);
        }else{
            array_push($ans, $minHeap->top());
        }
    }
    return $ans;
}

$n = 6;
$arr = [ 1, 2, 3, 4, 5, 6 ];
$k = 4;
$v = kthLargest($k, $arr, $n);
print_r($v);