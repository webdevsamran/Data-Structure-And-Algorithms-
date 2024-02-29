<?php

define('SIZE',3);

function minInitialPoints($points){
    $dp = array();
    $m = SIZE;
    $n = SIZE;
    $dp[$m-1][$n-1] = ($points[$m-1][$n-1] > 0) ? 1 : abs($points[$m - 1][$n - 1]) + 1;
    for($i = $m-2; $i >= 0; $i--){
        $dp[$i][$n-1] = max($dp[$i + 1][$n - 1] - $points[$i][$n - 1], 1);
    }
    for($j = $n-2; $j >= 0; $j--){
        $dp[$m - 1][$j] = max($dp[$m - 1][$j + 1] - $points[$m - 1][$j], 1);
    }
    for($i = $m-2; $i >= 0; $i--){
        for($j = $n-2; $j >= 0; $j--){
            $min_points_on_exit = min($dp[$i + 1][$j], $dp[$i][$j + 1]);
            $dp[$i][$j] = max($min_points_on_exit - $points[$i][$j], 1);
        }
    }
    return $dp[0][0];
}

$points = [ 
    [ -2, -3, 3 ], 
    [ -5, -10, 1 ], 
    [ 10, 30, -5 ] 
];
echo "Minimum Initial Points Required: " . minInitialPoints($points);