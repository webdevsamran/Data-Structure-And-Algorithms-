<?php

function findPartiion($arr, $n){
    $sum = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $arr[$i];
    }
    if($sum % 2 != 0){
        return false;
    }
    $part = array();
    for($i = 0; $i < (int)($sum / 2); $i++){
        $part[$i] = 0;
    }
    for($i = 0; $i < $n; $i++){
        for($j = (int)($sum / 2); $j >= $arr[$i]; $j--){
            if($part[$j - $arr[$i]] == 1 || $j == $arr[$i]){
                $part[$j] = 1;
            }
        }
    }
    return $part[(int)($sum / 2)];
}

$arr = [ 1, 3, 3, 2, 3, 2 ];
$n = sizeof($arr);
if (findPartiion($arr, $n) == true)
    echo "Can be divided into two subsets of equal sum";
else
    echo "Can not be divided into two subsets of equal sum";