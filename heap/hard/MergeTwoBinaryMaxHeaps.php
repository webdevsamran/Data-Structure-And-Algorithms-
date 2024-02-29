<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function maxHeapify(&$merged,$i,$n){
    if($i >= $n){
        return;
    }
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    $smallest = $i;
    if($left < $n && $merged[$left] > $merged[$smallest]){
        $smallest = $left;
    }
    if($right < $n && $merged[$right] > $merged[$smallest]){
        $smallest = $right;
    }
    if($smallest != $i){
        swap($merged[$smallest],$merged[$i]);
        maxHeapify($merged,$smallest,$n);
    }
}

function buildMaxHeap(&$merged,$n){
    for($i = (int)(($n-1)/2); $i >= 0; $i--){
        maxHeapify($merged,$i,$n);
    }
}

function mergeHeaps(&$merged,$a,$b,$n,$m){
    for($i = 0; $i < $n; $i++){
        $merged[$i] = $a[$i];
    }
    for($i = 0; $i < $m; $i++){
        $merged[$n + $i] = $b[$i];
    }
    buildMaxHeap($merged,$n+$m);
}

$a = [ 10, 5, 6, 2 ];
$b = [ 12, 7, 9 ];
$N = sizeof($a);
$M = sizeof($b);
$merged = array();

mergeHeaps($merged, $a, $b, $N, $M);
print_r($merged);