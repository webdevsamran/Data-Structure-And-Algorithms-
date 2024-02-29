<?php

function compare($a, $b){
    return abs($a) < abs($b);
}

function findMinSum($arr, $n){
    usort($arr, "compare");
    print_r($arr);
    $min = PHP_INT_MAX;
    $x = $y = NULL;
    for($i = 1; $i < $n; $i++){
        if(abs($arr[$i - 1] + $arr[$i]) <= $min){
            $min = abs($arr[$i - 1] + $arr[$i]);
            $x = $i - 1;
            $y = $i;
        }
    }
    echo "The two elements whose sum is minimum are " . $arr[$x] . " and " . $arr[$y];
}

$arr = [ 1, 60, -10, 70, -80, 85 ];
$n = sizeof($arr);
findMinSum($arr, $n);