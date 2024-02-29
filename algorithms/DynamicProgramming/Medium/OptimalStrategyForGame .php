<?php

function optimalStrategyOfGame($arr,$n){
    $table = array();
    for($gap = 0; $gap < $n; $gap++){
        for($i = 0, $j = $gap; $j < $n; $i++, $j++){
            $x = ($i + 2 <= $j) ? $table[$i + 2][$j] : 0;
            $y = ($i + 1 <= $j - 1) ? $table[$i + 1][$j - 1] : 0;
            $z = ($i <= $j - 2) ? $table[$i][$j - 2] : 0;
            $table[$i][$j] = max($arr[$i] + min($x, $y), $arr[$j] + min($y, $z));
        }
    }
    return $table[0][$n-1];
}

$arr1 = [ 8, 15, 3, 7 ];
$n = sizeof($arr1);
printf("%d", optimalStrategyOfGame($arr1, $n));