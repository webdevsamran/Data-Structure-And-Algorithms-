<?php

function maximum_toys($cost,$n,$k){
    $count = $sum = 0;
    sort($cost);
    for($i = 0; $i < $n; $i++){
        if($sum + $cost[$i] <= $k){
            $sum += $cost[$i];
            $count++;
        }
    }
    return $count;
}

$K = 50;
$cost = [ 1, 12, 5, 111, 200, 1000, 10, 9, 12, 15 ];
$N = sizeof($cost);
echo maximum_toys($cost, $N, $K);