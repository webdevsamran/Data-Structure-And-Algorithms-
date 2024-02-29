<?php

define('MAX_CHAR',256);

function countSub($str){
    $last = array_fill(0,MAX_CHAR,-1);
    $n = strlen($str);
    $dp = array();
    $dp[0] = 1;
    for($i = 1; $i <= $n; $i++){
        $dp[$i] = 2 * $dp[$i-1];
        if($last[ord($str[$i-1])] != -1){
            $dp[$i] -= $dp[$last[ord($str[$i - 1])]];
        }
        $last[ord($str[$i-1])] = ($i - 1);
    }
    return $dp[$n];
}

echo countSub("gfg");