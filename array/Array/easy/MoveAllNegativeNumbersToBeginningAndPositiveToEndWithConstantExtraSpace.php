<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function rearrange(&$arr,$n){
    $j = 0;
    for($i = 0; $i < $n; $i++){
        if($arr[$i] < 0 && $i != $j){
            swap($arr[$i],$arr[$j++]);
        }
    }
}

$arr = [ -1, 2, -3, 4, 5, 6, -7, 8, 9 ];
$n = sizeof($arr);
rearrange($arr, $n);
print_r($arr);