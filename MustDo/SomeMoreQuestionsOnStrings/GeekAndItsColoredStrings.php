<?php

function possibleStrings($n, $r, $b, $g){
    $fact = array();
    $fact[0] = 1;
    for($i = 1; $i <= $n; $i++){
        $fact[$i] = $fact[$i - 1] * $i;
    }
    $left = $n - ($r + $g + $b);
    $sum = 0;
    for($i = 0; $i <= $left; $i++){
        for($j = 0; $j <= $left - $i; $j++){
            $k = $left - ($i + $j);
            $sum = $sum + (int)($fact[$n] / ($fact[$i + $r] * $fact[$j + $b] * $fact[$k + $g]));
        }
    }
    return $sum;
}

$n = 4;
$r = 2;
$b = 0;
$g = 1;
echo possibleStrings($n, $r, $b, $g);