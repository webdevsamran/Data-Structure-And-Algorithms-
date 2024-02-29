<?php

function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function zigZag(&$arr, $n){
    for($i = 0; $i < $n-1; $i++){
        if($i % 2 == 0 && $arr[$i] > $arr[$i+1]){
            swap($arr[$i],$arr[$i+1]);
        }else if($i % 2 == 1 && $arr[$i] < $arr[$i+1]){
            swap($arr[$i],$arr[$i+1]);
        }
    }
}

$N = 7;
$arr = [4, 3, 7, 8, 6, 2, 1];
zigZag($arr, $N);
print_r($arr);