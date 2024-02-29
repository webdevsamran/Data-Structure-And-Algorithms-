<?php

function maxProfit($prices,$n){
    $maxProfit = 0;
    for($i = 1; $i < $n; $i++){
        if($prices[$i] > $prices[$i-1]){
            $maxProfit += $prices[$i] - $prices[$i-1];
        }
    }
    return $maxProfit;
}

$prices = [ 100, 180, 260, 310, 40, 535, 695 ];
$N = sizeof($prices);
echo maxProfit($prices, $N);