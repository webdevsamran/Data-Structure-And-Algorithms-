<?php

function lcs($X,$Y,$m,$n,&$dp){
    if($m == 0 || $n == 0){
        return 0;
    }
    if($dp[$m][$n] != -1){
        return $dp[$m][$n];
    }
    if($X[$m-1] == $Y[$n-1]){
        return $dp[$m][$n] = 1 + lcs($X,$Y,$m-1,$n-1,$dp);
    }
    return $dp[$m][$n] = max(lcs($X,$Y,$m,$n-1,$dp),lcs($X,$Y,$m-1,$n,$dp));
}

$X = "AGGTAB";
$Y = "GXTXAYB";
$m = strlen($X);
$n = strlen($Y);
$dp = array_fill(0,$m + 1,array_fill(0,$n + 1, -1));
echo "Length of LCS is " . lcs($X, $Y, $m, $n, $dp);