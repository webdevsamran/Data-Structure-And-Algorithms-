<?php

function maxPathSum($matrix, $i, $j){
    if($i < 0 || $j < 0){
        return -10000000;
    }
    if($i == 0 && $j == 0){
        return $matrix[$i][$j];
    }
    $up = $matrix[$i][$j] + maxPathSum($matrix, $i-1, $j);
    $right = $matrix[$i][$j] + maxPathSum($matrix, $i, $j - 1);
    $up_left_diagonal = $matrix[$i][$j] + maxPathSum($matrix, $i - 1, $j - 1);
    return max($up, max($right,$up_left_diagonal));
}

$matrix = [ 
    [ 100, -350, -200 ],
    [ -100, -300, 700 ] 
];
echo maxPathSum($matrix, 1, 2);