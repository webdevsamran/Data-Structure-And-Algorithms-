<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function selectionSort(&$arr,$n){
    for($i = 0; $i < $n - 1; $i++){
        $min_idx = $i;
        for($j = $i + 1; $j < $n; $j++){
            if($arr[$j] < $arr[$min_idx]){
                $min_idx = $j;
            }
        }
        swap($arr[$min_idx],$arr[$i]);
    }
}

$arr = [ 0, 23, 14, 12, 9 ];
$n = sizeof($arr);
selectionSort($arr, $n);
print_r($arr);