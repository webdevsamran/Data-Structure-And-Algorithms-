<?php

function maxDiff($arr,$size){
    $hash1 = array();
    $hash2 = array();
    $sum1 = 0;
    $sum2 = 0;

    for($i = 0; $i < $size; $i++){
        if($arr[$i] > 0){
            if(!array_key_exists($arr[$i],$hash1)){
                $hash1[$arr[$i]] = 0;
            }
            $hash1[$arr[$i]]++;
        }
        if($arr[$i] < 0){
            if(!array_key_exists(abs($arr[$i]),$hash2)){
                $hash2[abs($arr[$i])] = 0;
            }
            $hash2[abs($arr[$i])]++;
        }
    }
    for($i = 0; $i < $size; $i++){
        if($arr[$i] > 0 && $hash1[$arr[$i]] == 1){
            $sum1 += $arr[$i];
        }
        if($arr[$i] < 0 && $hash2[abs($arr[$i])] == 1){
            $sum2 += abs($arr[$i]);
        }
    }

    return abs($sum1 - $sum2);
}

$arr = [ 4, 2, -3, 3, -2, -2, 8 ];
$n = sizeof($arr);
echo "Maximum Difference = " . maxDiff($arr, $n);