<?php

function constructArr(&$arr,$pair,$n){
    $arr[0] = (int)(($pair[0]+$pair[1]-$pair[$n-1]) / 2);
    for($i = 1; $i < $n; $i++){
        $arr[$i] = $pair[$i-1] - $arr[0];
    }
}

$pair = [15, 13, 11, 10, 12, 10, 9, 8, 7, 5];
$n = 5;
$arr = array();
constructArr($arr, $pair, $n);
for ($i = 0; $i < $n; $i++)
    echo $arr[$i] . " ";