<?php

function solve($i, $j, $n, $arr, &$memo){
    if(($i > $j) || ($i >= $n) || ($j < 0)){
        return 0;
    }
    $k = [$i,$j];
    if($memo[serialize($k)] != 0){
        return $memo[serialize($k)];
    }
    $option1 = $arr[$i] + min(solve($i + 2, $j, $n, $arr, $memo),solve($i + 1, $j - 1, $n, $arr, $memo));
    $option2 = $arr[$j] + min(solve($i + 1, $j - 1, $n, $arr, $memo),solve($i, $j - 2, $n, $arr, $memo));
    $memo[serialize($k)] = max($option1,$option2);
    return $memo[serialize($k)];
}

function optimalStrategyOfGame($arr, $n){
    $memo = array();
    return solve(0, $n - 1, $n, $arr, $memo);
}

$arr1 = [ 5,3,7,10 ];
$n = sizeof($arr1);
printf("%d<br/>", optimalStrategyOfGame($arr1, $n));

$arr2 = [ 2, 2, 2, 2 ];
$n = sizeof($arr2);
printf("%d<br/>", optimalStrategyOfGame($arr2, $n));

$arr3 = [ 20, 30, 2, 2, 2, 10 ];
$n = sizeof($arr3);
printf("%d<br/>", optimalStrategyOfGame($arr3, $n));