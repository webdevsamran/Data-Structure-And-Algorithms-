<?php

function minimumCostOfBreaking($X,$Y,$m,$n){
    $res = 0;
    rsort($X);
    rsort($Y);
    $hrt = 1;
    $vert = 1;
    $i = 0;
    $j = 0;
    while($i < $m && $j < $n){
        if($X[$i] > $Y[$j]){
            $res += $X[$i] * $vert;
            $hrt++;
            $i++;
        }else{
            $res += $Y[$j] * $hrt;
            $vert++;
            $j++;
        }
    }
    $total = 0;
    while($i < $m){
        $total += $X[$i++];
    }
    $res += $total * $vert;
    $total = 0;
    while($j < $n){
        $total += $Y[$j++];
    }
    $res += $total * $hrt;
    return $res;
}

$m = 6;
$n = 4;
$X = [2, 1, 3, 1, 4];
$Y = [4, 1, 2];
echo minimumCostOfBreaking($X, $Y, $m-1, $n-1);