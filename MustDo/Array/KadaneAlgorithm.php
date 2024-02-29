<?php

function maxSubarraySum($arr, $n){
    $sum = 0;
    $maxI = $arr[0];
    for($i = 0; $i < $n; $i++){
        $sum += $arr[$i];
        if($maxI < $sum){
            $maxI = $sum;
        }
        if($sum < 0){
            $sum = 0;
        }
    }
    return $maxI;
}

$N = 5;
$arr = [1,2,3,-2,5];
echo maxSubarraySum($arr,$N);