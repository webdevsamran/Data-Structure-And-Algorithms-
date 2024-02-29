<?php

function maxIndexDiff($arr,$n){
    $leftMin = array();
    $leftMin[0] = $arr[0];
    for($i = 1; $i < $n; $i++){
        $leftMin[$i] = min($leftMin[$i-1],$arr[$i]);
    }
    $maxDist = PHP_INT_MIN;
    $i = $n - 1;
    $j = $n - 1;
    while($i >= 0 && $j >= 0){
        if($arr[$j] >= $leftMin[$i]){
            $maxDist = max($maxDist, $j - $i);
            $i--;
        }else{
            $j--;
        }
    }
    return $maxDist;
}

$arr = [ 34,8,10,3,2,80,30,33,1];
$n = sizeof($arr);
$maxDiff = maxIndexDiff($arr, $n);
echo $maxDiff;