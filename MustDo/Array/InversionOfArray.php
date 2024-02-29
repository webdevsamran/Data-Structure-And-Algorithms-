<?php

function inversionCount(&$arr, $n){
    $sum = 0;
    $i = 0;
    while($i < $n - 1){
        $j = $i + 1;
        while($j < $n){
            if($arr[$j] < $arr[$i]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $temp;
                $sum++;
            }
            $j++;
        }
        $i++;
    }
    return $sum;
}

$N = 5;
$arr = [2, 4, 1, 3, 5];

echo inversionCount($arr,$N);