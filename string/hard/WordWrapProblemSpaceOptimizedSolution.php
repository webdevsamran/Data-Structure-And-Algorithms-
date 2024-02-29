<?php

function solveWordWrap($arr,$n,$k){
    $curr_len = NULL;
    $dp = array();
    $ans = array();
    $dp[$n-1] = 0;
    $ans[$n-1] = $n - 1;

    for($i = $n - 2; $i >= 0; $i--){
        $curr_len = -1;
        $dp[$i] = PHP_INT_MAX;
        for($j = $i; $j < $n; $j++){
            $curr_len += ($arr[$j] + 1);
            if ($curr_len > $k)
                break;
            if ($j == $n - 1)
                $cost = 0;
            else
                $cost = ($k - $curr_len) * ($k - $curr_len) + $dp[$j + 1];
            if ($cost < $dp[$i]) {
                $dp[$i] = $cost;
                $ans[$i] = $j;
            }
        }
    }

    $i = 0;
    while ($i < $n) {
        echo $i + 1 . " " . $ans[$i] + 1 . " ";
        $i = $ans[$i] + 1;
    }
}

$arr = [ 3, 2, 2, 5 ];
$n = sizeof($arr);
$M = 6;
solveWordWrap($arr, $n, $M);