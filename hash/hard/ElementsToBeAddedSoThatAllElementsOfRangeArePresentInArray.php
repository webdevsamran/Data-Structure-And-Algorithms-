<?php

function countNum($arr,$n){
    $count = 0;
    sort($arr);
    $min = $arr[0];
    $max = $arr[$n-1];
    for($i = $min; $i <= $max; $i++){
        if(!in_array($i,$arr)){
            $count++;
        }
    }
    return $count;
}

$arr = [ 3, 5, 8, 6 ];
$n = sizeof($arr);
echo countNum($arr, $n);