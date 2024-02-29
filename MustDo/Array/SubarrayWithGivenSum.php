<?php

function subarraySum($arr, $n, $s){
    $start = 0;
    $end = 0;
    $sum = 0;
    while($end < $n){
        $sum += $arr[$end];
        if($sum > $s && $s != 0){
            $sum -= $arr[$start++];
        }
        if($sum == $s){
            return [$start+1,$end+1];
        }
        $end++;
    }
    return [-1];
}

$N = 5;
$S = 12;
$A = [1,2,3,7,5];

print_r(subarraySum($A, $N, $S));