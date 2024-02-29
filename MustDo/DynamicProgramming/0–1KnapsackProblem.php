<?php

function knapSack($W,$weight,$profit,$n){
    $k = array();
    for($i = 0; $i <= $n; $i++){
        for($w = 0; $w <= $W; $w++){
            if($i == 0 || $w == 0){
                $k[$i][$w] = 0;
            }else if($weight[$i-1] <= $w){
                $k[$i][$w] = max($profit[$i - 1] + $k[$i-1][$w - $weight[$i-1]], $k[$i-1][$w]);
            }else{
                $k[$i][$w] = $k[$i-1][$w];
            }
        }
    }
    return $k[$n][$W];
}

$profit = [ 60, 100, 120 ];
$weight = [ 10, 20, 30 ];
$W = 50;
$n = sizeof($profit);
echo knapSack($W, $weight, $profit, $n);