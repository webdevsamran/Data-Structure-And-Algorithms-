<?php

function swap(&$arr, $i, $j){
    while($i < $j){
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
        $i++;
        $j--;
    }
}

function reverseInGroups(&$arr, $n, $k){
    for($i = 0; $i < $n; $i += $k){
        swap($arr, $i, $i + $k -1);
    }
    return $arr;
}

$N = 5;
$K = 3;
$arr = [1,2,3,4,5];

print_r(reverseInGroups($arr,$N,$K));