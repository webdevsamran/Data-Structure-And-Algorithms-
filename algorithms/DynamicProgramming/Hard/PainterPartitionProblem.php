<?php

function sum($arr,$i,$j){
    $total = 0;
    for($k = $i; $k <= $j; $k++){
        $total += $arr[$k];
    }
    return $total;
}

function findMax($arr, $n, $k){
    $dp = array_fill(0,$k+1,array_fill(0,$n+1,0));
    for($i = 1; $i <= $n; $i++){
        $dp[1][$i] = sum($arr, 0, $i - 1);
    }
    for($i = 1; $i <= $k; $i++){
        $dp[$i][1] = $arr[0];
    }
    for($i = 2; $i <= $k; $i++){
        for($j = 2; $j <= $n; $j++){
            $best = PHP_INT_MAX;
            for($p = 1; $p <= $j; $p++){
                $best = min($best, max($dp[$i-1][$p],sum($arr,$p,$j-1)));
            }
            $dp[$i][$j] = $best;
        }
    }
    return $dp[$k][$n];
}

$arr = [ 10, 20, 60, 50, 30, 40 ];
$n = sizeof($arr);
$k = 3;
echo findMax($arr, $n, $k);