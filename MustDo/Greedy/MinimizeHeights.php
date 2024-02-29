<?php

function getMinDiff($arr, $n, $k){
    sort($arr);
    $ans = $arr[$n-1] - $arr[0];
    $tempmin = $arr[0];
    $tempmax = $arr[1];
    for($i = 1; $i < $n; $i++){
        if($arr[$i] - $k < 0){
            continue;
        }
        $tempmin = min($arr[0] + $k, $arr[$i] - $k);
        $tempmax = max($arr[$i - 1] + $k, $arr[$n - 1] - $k);
        $ans = min($ans, $tempmax - $tempmin);
    }
    return $ans;
}

$k = 6;
$n = 6;
$arr = [ 7, 4, 8, 8, 8, 9 ];
$ans = getMinDiff($arr, $n, $k);
echo $ans;