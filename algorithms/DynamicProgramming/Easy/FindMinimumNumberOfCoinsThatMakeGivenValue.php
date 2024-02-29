<?php

function minCoins($coins, $m, $v){
    $table = array();
    $table[0] = 0;
    for($i = 1; $i <= $v; $i++){
        $table[$i] = PHP_INT_MAX;
    }
    for($i = 1; $i <= $v; $i++){
        for($j = 0; $j < $m; $j++){
            if($coins[$j] <= $i){
                $sub_res = $table[$i - $coins[$j]];
                if($sub_res != PHP_INT_MAX && $sub_res + 1 < $table[$i]){
                    $table[$i] = 1 + $sub_res;
                }
            }
        }
    }
    if($table[$v] == PHP_INT_MAX){
        return -1;
    }
    return $table[$v];
}

$coins = [ 9, 6, 5, 1 ];
$m = sizeof($coins);
$V = 11;
echo "Minimum coins required is " . minCoins($coins, $m, $V);