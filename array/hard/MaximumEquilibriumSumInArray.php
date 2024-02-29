<?php

function findMaxSum($arr,$n){
    $sum = array_sum($arr);
    $prefix_sum = 0;
    $res = PHP_INT_MIN;
    for($i = 0; $i < $n; $i++){
        $prefix_sum += $arr[$i];
        if($prefix_sum == $sum){
            $res = max($res,$prefix_sum);
        }
        $sum -= $arr[$i];
    }
    return $res;
}

$arr = [ -2, 5, 3, 1, 2, 6, -4, 2 ];
$n = sizeof($arr);
echo findMaxSum($arr, $n);