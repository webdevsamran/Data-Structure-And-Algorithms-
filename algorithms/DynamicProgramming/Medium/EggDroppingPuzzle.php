<?php

define('MAX',1000);
$memo = array_fill(0,MAX,array_fill(0,MAX,-1));

function solveEggDrop($n, $k){
    global $memo;
    if($memo[$n][$k] != -1){
        return $memo[$n][$k];
    }
    if($k == 1 || $k == 0){
        return $k;
    }
    if($n == 1){
        return $k;
    }
    $min = PHP_INT_MAX;
    $x = $res = NULL;
    for($x = 1; $x <= $k; $x++){
        $res = max(solveEggDrop($n-1,$x-1),solveEggDrop($n,$k-$x));
        if($res < $min){
            $min = $res;
        }
    }
    $memo[$n][$k] = $min + 1;
    return $min + 1;
}

$n = 2;
$k = 36;
echo "Minimum number of trials in worst case with " . $n . " eggs and " . $k . " floors is ";
echo solveEggDrop($n, $k);