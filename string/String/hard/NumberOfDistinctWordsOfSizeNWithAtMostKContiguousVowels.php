<?php

function powerPat($x,$y,$p){
    $res = 1;
    $x = $x % $p;
    if($x == 0){
        return 0;
    }
    while($y > 0){
        if($y & 1){
            $res = ($res * $x) % $p;
        }
        $y = $y >> 1;
        $x = ($x * $x) % $p;
    }
    return $res;
}

function kvowelwords($n,$k){
    $i = $j = NULL;
    $mod = 1000000007;
    $dp = array_fill(0,$n+1,array_fill(0,$k+1,0));
    $sum = 1;
    for($i = 1; $i <= $n; $i++){
        $dp[$i][0] = $sum % 21;
        $dp[$i][0] %= $mod;
        $sum = $dp[$i][0];
        for($j = 1; $j <= $k; $j++){
            if($j > $i){
                $dp[$i][$j] = 0;
            }else if($j == $i){
                $dp[$i][$j] = powerPat(5, $i, $mod);
            }else{
                $dp[$i][$j] = $dp[$i - 1][$j - 1] * 5;
            }
            $dp[$i][$j] %= $mod;
            $sum += $dp[$i][$j];
            $sum %= $mod;
        }
    }
    return $sum;
}

$N = 3;
$K = 3;
echo kvowelwords($N, $K);