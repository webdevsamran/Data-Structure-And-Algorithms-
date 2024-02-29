<?php

function equilibriumPoint($arr, $n){
    $l = $r = $i = 0;
    $j = $n - 1;
    while($i <= $j){
        if($l == $r && $i == $j){
            return $i + 1;
        }
        if($l < $r){
            $l += $arr[$i];
            $i++;
        }else{
            $r += $arr[$j];
            $j--;
        }
    }
    return -1;
}

$n = 5;
$A = [1,3,5,2,2];

echo equilibriumPoint($A,$n);