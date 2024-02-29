<?php

function maxSumIS($arr, $n){
    $max = 0;
    $msis = array();
    for($i = 0; $i < $n; $i++){
        $msis[$i] = $arr[$i];
    }
    for($i = 1; $i < $n; $i++){
        for($j = 0; $j < $i; $j++){
            if($arr[$i] > $arr[$j] && $msis[$i] < $msis[$j] + $arr[$i]){
                $msis[$i] = $msis[$j] + $arr[$i];
            }
        }
    }
    for($i = 0; $i < $n; $i++){
        if($max < $msis[$i]){
            $max = $msis[$i];
        }
    }
    return $max;
}

$arr = [ 1, 101, 2, 3, 100, 4, 5 ];
$n = sizeof($arr);
echo "Sum of maximum sum increasing subsequence is " . maxSumIS( $arr, $n );