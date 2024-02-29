<?php

function find($arr,$n,$k){
    sort($arr);
    $b = ceil($n/$k);
    $min_sum = 0;
    $max_sum = 0;

    for($i = 0; $i < $b; $i++){
        $min_sum += $arr[$i];
    }
    for($i = $n - 1; $i >= $n - $b; $i--){
        $max_sum += $arr[$i];
    }
    echo "Min Sum: " . $min_sum . ", Max Sum: " . $max_sum;
}

$arr = [3, 2, 1, 4];
$n = sizeof($arr);
$k = 2;

find($arr,$n,$k);