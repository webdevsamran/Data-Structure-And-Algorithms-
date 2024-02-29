<?php

function calculate($arr,$size){
    sort($arr);
    $result = array();
    for($i = 0, $j = $size-1; $i < $j; $i++,$j--){
        array_push($result,($arr[$i]+$arr[$j]));
    }
    $min = min($result);
    $max = max($result);
    return abs($max-$min);
}

$a = [ 2, 6, 4, 3 ];
$n = sizeof($a);
echo calculate($a, $n);