<?php

define('MAX',100);

function MatrixChainOrderUtil(&$arr,$i,$j){
    global $dp;
    if($i == $j){
        return 0;
    }
    if($dp[$i][$j] != -1){
        return $dp[$i][$j];
    }
    $dp[$i][$j] = PHP_INT_MAX;
    for($k = $i; $k < $j; $k++){
        $dp[$i][$j] = min($dp[$i][$j],MatrixChainOrderUtil($arr,$i,$k)+MatrixChainOrderUtil($arr,$k+1,$j)+$arr[$i-1]*$arr[$k]*$arr[$j]);
    }
    return $dp[$i][$j];
}

function MatrixChainOrder(&$arr,$n){
    $i = 1;
    $j = $n-1;
    return MatrixChainOrderUtil($arr,$i,$j);
}

$arr = [ 1, 2, 3, 4 ];
$n = sizeof($arr);
$dp = array_fill(0,MAX,array_fill(0,MAX,-1));

echo "Minimum number of multiplications is " . MatrixChainOrder($arr, $n);