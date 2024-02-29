<?php

function getMinSquares($n){
    if($n <= 3){
        return $n;
    }
    $dp = array();
    $dp[0] = 0;
    $dp[1] = 1;
    $dp[2] = 2;
    $dp[3] = 3;
    for($i = 4; $i <= $n; $i++){
        $dp[$i] = $i;
        for($x = 1; $x <= ceil(sqrt($i)); $x++){
            $temp = $x * $x;
            if($temp > $i){
                break;
            }else{
                $dp[$i] = min($dp[$i], 1 + $dp[$i - $temp]);
            }
        }
    }
    $res = $dp[$n];
    return $res;
}

echo getMinSquares(6);