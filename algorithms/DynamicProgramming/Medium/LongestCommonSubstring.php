<?php

function lcs($X, $Y, $i, $j, $count){
    if($i == 0 || $j == 0){
        return $count;
    }
    if($X[$i-1] == $Y[$j-1]){
        $count = lcs($X, $Y, $i - 1, $j - 1,$count + 1);
    }
    $count = max($count,max(lcs($X, $Y, $i, $j - 1, 0),lcs($X, $Y, $i - 1, $j, 0)));
    return $count;
}

$X = "abcdxyz";
$Y = "xyzabcd";
$n = strlen($X);
$m = strlen($Y);
$count = 0;
echo lcs($X, $Y, $n, $m, $count);