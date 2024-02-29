<?php

function minSum($arr, $n){
    $dp = array();
    if($n == 1){
        return $arr[0];
    }
    if($n == 2){
        return min($arr[0],$arr[1]);
    }
    if($n == 3){
        return min($arr[0],$arr[1],$arr[2]);
    }
    if($n == 4){
        return min($arr[0],$arr[1],$arr[2],$arr[3]);
    }
    $dp[0] = $arr[0];
    $dp[1] = $arr[1];
    $dp[2] = $arr[2];
    $dp[3] = $arr[3];

    for($i = 4; $i < $n; $i++){
        $dp[$i] = $arr[$i] + min($dp[$i-1],$dp[$i-2],$dp[$i-3],$dp[$i-4]);
    }
    return min($dp[$n-1],$dp[$n-2],$dp[$n-3],$dp[$n-4]);
}

$arr = [ 1, 2, 3, 3, 4, 5, 6, 1 ];
$n = sizeof($arr);
echo minSum($arr, $n);