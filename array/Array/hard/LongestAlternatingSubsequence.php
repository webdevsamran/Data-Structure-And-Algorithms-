<?php

function LAS($arr,$n){
    $inc = 1;
    $dec = 1;
    for($i = 1; $i < $n; $i++){
        if($arr[$i] > $arr[$i-1]){
            $inc = $dec + 1;
        }else if($arr[$i] < $arr[$i-1]){
            $dec = $inc + 1;
        }
    }
    return max($inc,$dec);
}

$arr = [ 10, 22, 9, 33, 49, 50, 31, 60 ];
$n = sizeof($arr);
echo LAS($arr, $n);