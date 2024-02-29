<?php

function leaders($arr, $n){
    $ans = array();
    $max = PHP_INT_MIN;
    for($i = $n - 1; $i >= 0; $i--){
        if($arr[$i] > $max){
            $max = $arr[$i];
            array_push($ans,$arr[$i]);
        }
    }
    return $ans = array_reverse($ans);
}

$n = 6;
$A = [16,17,4,3,5,2];

print_r(leaders($A,$n));