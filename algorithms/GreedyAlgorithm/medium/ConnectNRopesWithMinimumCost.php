<?php

function minCost($ropes,$size){
    $cost = 0;
    sort($ropes,SORT_DESC);
    print_r($ropes);
    for($i = 1;$i < $size; $i++){
        $ropes[$i] += $ropes[$i-1];
        $cost += $ropes[$i];
        echo $cost . " ";
    }
    return $cost;
}

$ropes = [ 4, 3, 2, 6 ];
$n = sizeof($ropes);
$min_cost = minCost($ropes, $n);
echo "Minimum cost to connect ropes is: " . $min_cost;