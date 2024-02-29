<?php

function countTriplet($arr, $n){
    $count = 0;
    for($i = 0; $i < $n - 1; $i++){
        for($j = $i + 1; $j < $n; $j++){
            if(in_array($arr[$i] + $arr[$j],$arr)){
                $count++;
            }
        }
    }
    return $count;
}

$N = 4;
$arr = [1, 5, 3, 2];
echo countTriplet($arr, $N);