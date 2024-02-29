<?php

function minOperations($n){
    $dp = array();
    $dp[0] = 0;
    for($i = 1; $i <= $n; $i++){
        $dp[$i] = PHP_INT_MAX;
        if($i % 2 == 0){
            $x = $dp[(int)($i / 2)];
            if($x + 1 < $dp[$i]){
                $dp[$i] = $x + 1;
            }
        }
        $x = $dp[$i - 1];
        if($x + 1 < $dp[$i]){
            $dp[$i] = $x + 1;
        }
    }
    return $dp[$n];
}

$n = 7;
echo minOperations($n);