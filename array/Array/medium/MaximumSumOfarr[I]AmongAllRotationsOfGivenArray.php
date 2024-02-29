<?php

function findPivot($arr,$n){
    for($i = 0; $i < $n; $i++){
        if($arr[$i] > $arr[$i+1 % $n]){
            return $i;
        }
    }
}

function maxSum($arr,$n){
    $sum= 0;
    $i = NULL;
    $pivot = findPivot($arr,$n);
    $diff = $n - 1 - $pivot;
    for($i = 0; $i < $n; $i++){
        $sum += (($i + $diff) % $n)  * $arr[$i];
    }
    return $sum;
}

$arr = [ 8, 13, 1, 2 ];
$n = sizeof($arr);
$max = maxSum($arr, $n);
echo $max;