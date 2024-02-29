<?php

function printKMax($arr, $n, $k){
    $ans = array();
    $heap = new SplMaxHeap;
    for($i = 0; $i < $k; $i++){
        $heap->insert([$arr[$i],$i]);
    }
    array_push($ans, $heap->top()[0]);
    for($i = $k; $i < $n; $i++){
        $heap->insert([$arr[$i],$i]);
        while($heap->top()[1] <= $i - $k){
            $heap->extract();
        }
        array_push($ans,$heap->top()[0]);
    }
    return $ans;

}

$arr = [ 1, 2, 3, 1, 4, 5, 2, 3, 6 ];
$N = sizeof($arr);
$K = 3;
print_r(printKMax($arr, $N, $K));