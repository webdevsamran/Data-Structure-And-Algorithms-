<?php

function maxIndexDiff($arr, $n){
    $LMin = array();
    $RMax = array();
    $LMin[0] = $arr[0];
    for($i = 1; $i < $n; $i++){
        $LMin[$i] = min($arr[$i],$LMin[$i-1]);
    }
    $RMax[$n-1] = $arr[$n-1];
    for($i = $n - 2; $i >= 0; $i--){
        $RMax[$i] = max($arr[$i],$RMax[$i+1]);
    }
    $i = $j = 0;
    $maxDiff = -1;
    while($i < $n && $j < $n){
        if($LMin[$i] <= $RMax[$j]){
            $maxDiff = max($maxDiff, $j - $i);
            $j++;
        }else{
            $i++;
        }
    }
    return $maxDiff;
}

$arr = [ 9, 2, 3, 4, 5, 6, 7, 8, 18, 0 ];
$n = sizeof($arr);
$maxDiff = maxIndexDiff($arr, $n);
echo $maxDiff;