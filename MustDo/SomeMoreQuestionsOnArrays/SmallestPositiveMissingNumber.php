<?php

function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function firstMissingPositive($arr, $n){
    for ($i = 0; $i < $n; $i++) {
        while ($arr[$i] >= 1 && $arr[$i] <= $n && $arr[$i] != $arr[$arr[$i] - 1]) {
            swap($arr[$i], $arr[$arr[$i] - 1]);
        }
    }
    for ($i = 0; $i < $n; $i++) {
        if ($arr[$i] != $i + 1) {
            return $i + 1;
        }
    }
    return $n + 1;
}

$arr = [ 0, 10, 2, -10, -20 ];
$n = sizeof($arr);
$ans = firstMissingPositive($arr, $n);
echo $ans;