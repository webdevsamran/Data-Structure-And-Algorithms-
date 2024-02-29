<?php

function find_difference($arr,$n,$m){
    $max = 0;
    $min = 0;
    sort($arr);
    for($i = 0; $i < $m; $i++){
        $min += $arr[$i];
        $max += $arr[$n - 1 - $i];
    }
    return abs($max - $min);
}

$arr = [ 1, 2, 3, 4, 5 ];
$n = sizeof($arr);
$m = 4;
echo find_difference($arr, $n, $m);