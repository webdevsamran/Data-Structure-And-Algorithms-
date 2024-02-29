<?php

function findWater($arr,$n){
    $left = array();
    $right = array();
    $water = 0;
    $left[0] = $arr[0];
    for($i = 1; $i < $n; $i++){
        $left[$i] = max($left[$i-1],$arr[$i]);
    }
    $right[$n-1] = $arr[$n-1];
    for($i = $n-2; $i >= 0; $i--){
        $right[$i] = max($right[$i+1],$arr[$i]);
    }
    for($i = 1; $i < $n-1; $i++){
        $var = min($left[$i-1],$right[$i+1]);
        if($var > $arr[$i]){
            $water += $var - $arr[$i];
        }
    }
    return $water;
}

$arr = [ 0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1 ];
$n = sizeof($arr);
echo findWater($arr, $n);