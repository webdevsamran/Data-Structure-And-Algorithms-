<?php

define('row',4);
define('col',4);

function minCost($cost){
    for($i = 1; $i < row; $i++){
        $cost[$i][0] += $cost[$i-1][0];
    }
    for($j = 1; $j < col; $j++){
        $cost[0][$j] += $cost[0][$j-1];
    }
    for($i = 1; $i < row; $i++){
        for($j = 1; $j < col; $j++){
            $cost[$i][$j] += min($cost[$i - 1][$j - 1],min($cost[$i - 1][$j], $cost[$i][$j - 1]));
        }
    }
    return $cost[row -1][col - 1];
}

$cost = [
    [9,4,9,9],
    [6,7,6,4],
    [8,3,3,7],
    [7,4,9,10]
];
printf(" %d ", minCost($cost));