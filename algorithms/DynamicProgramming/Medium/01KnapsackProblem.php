<?php

function knapSack($W,$weight,$profit,$n){
    $dp = array_fill(0,$n+1,array_fill(0,$W+1,0));
    for($i = 0; $i <= $n; $i++){
        for($w = 0; $w <= $W; $w++){
            if($i == 0 || $w == 0){
                $dp[$i][$w] = 0;
            }else if($weight[$i - 1] <= $w){
                $dp[$i][$w] = max($profit[$i - 1] + $dp[$i - 1][$w - $weight[$i - 1]], $dp[$i - 1][$w]);
            }else{
                $dp[$i][$w] = $dp[$i - 1][$w];
            }
        }
    }
    return $dp[$n][$W];
}

$profit = [ 60, 100, 120 ];
$weight = [ 10, 20, 30 ];
$W = 50;
$n = sizeof($profit);
echo knapSack($W, $weight, $profit, $n);