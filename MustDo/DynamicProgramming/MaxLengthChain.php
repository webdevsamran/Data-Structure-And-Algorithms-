<?php

function compare($a,$b){
    return $b[1] < $a[1];
}

function maxChainLength($arr, $n){
    usort($arr,"compare");
    $prev = PHP_INT_MIN;
    $ans = 0;
    for($i = 0; $i < $n; $i++){
        if($arr[$i][0] > $prev){
            $ans++;
            $prev = $arr[$i][1];
        }
    }
    return $ans;
}

$arr = [
    [5, 24],
    [15, 25],
    [27, 40],
    [50, 60]
];
$n = sizeof($arr);
echo "Length of maximum size chain is " . maxChainLength( $arr, $n );