<?php

function findMinDiff($arr, $n, $m){
    sort($arr);
    $ans = PHP_INT_MAX;
    for($i = 0; $i < $n - $m; $i++){
        $ans = min($ans, ($arr[$i + $m -1] - $arr[$i]));
    }
    return $ans;
}

$N = 8;
$M = 5;
$A = [3, 4, 1, 9, 56, 7, 9, 12];

echo findMinDiff($A,$N,$M);