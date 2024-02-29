<?php

function solveWordWrap($n, $nums, $k){
    $total_cost = 0;
    for($i = 0; $i < $n - 1; $i++){
        $size = $k - 1 - $nums[$i];
        $sum = $k - $nums[$i];
        while($size >= 0){
            $size = $size - $nums[$i + 1]  - 1;
            if($size < 0){
                break;
            }
            $sum = $sum - $nums[$i] - 1;
            $i++;
        }
        $total_cost = $total_cost + ($sum * $sum);
    }
    echo $total_cost;
}

$n = 4;
$nums = [3,2,2,5];
$k = 6;
solveWordWrap($n, $nums, $k);