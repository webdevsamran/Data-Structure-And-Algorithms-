<?php

function uneatenLeaves($arr,$n,$k){
    $numbers = array_fill(0,$n,0);
    for($i = 0; $i < $k; $i++){
        $temp = $arr[$i];
        $j = 1;
        while($temp <= $n){
            $numbers[$temp - 1] = 1;
            $j++;
            $temp = $arr[$i] * $j;
        }
    }
    $left = 0;
    for($i = 0; $i < $n; $i++){
        if($numbers[$i] == 0){
            $left++;
        }
    }
    return $left;
}

$N = 10;
$K = 3;
$arr = [2, 3, 5];
echo uneatenLeaves($arr, $N, $K);