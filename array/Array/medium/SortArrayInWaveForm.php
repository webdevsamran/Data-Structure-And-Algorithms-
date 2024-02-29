<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function sortInWave(&$arr,$n){
    for($i = 0; $i < $n; $i+=2){
        if($i > 0 && $arr[$i - 1] > $arr[$i]){
            swap($arr[$i-1],$arr[$i]);
        }
        if($i < $n-1 && $arr[$i] < $arr[$i+1]){
            swap($arr[$i],$arr[$i+1]);
        }
    }
}

$arr = [ 10, 90, 49, 2, 1, 5, 23 ];
$n = sizeof($arr);
sortInWave($arr, $n);
print_r($arr);