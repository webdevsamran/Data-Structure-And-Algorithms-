<?php

function countCoins($coins,$n,$sum){
    $table = array_fill(0,$sum+1,0);
    $table[0] = 1;
    for($i = 0; $i < $n; $i++){
        for($j = $coins[$i]; $j <= $sum; $j++){
            $table[$j] += $table[$j - $coins[$i]];
        }
    }
    print_r($table);
    return $table[$sum];
}

$coins = [ 1, 2, 5 ];
$n = sizeof($coins);
$sum = 12;
echo countCoins($coins, $n, $sum);