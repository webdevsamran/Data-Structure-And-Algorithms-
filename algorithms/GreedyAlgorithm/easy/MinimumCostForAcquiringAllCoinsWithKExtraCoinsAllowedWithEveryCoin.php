<?php

function minCost($coin,$n,$k){
    sort($coin);
    $coins_needed = (int)($n/($k));
    $result = 0;
    for($i = 0; $i < $coins_needed; $i++){
        $result += $coin[$i];
    }
    return $result;
}

$coin = [8, 5, 3, 10, 2, 1, 15, 25];
$n = sizeof($coin);
$k = 3;
echo minCost($coin, $n, $k);