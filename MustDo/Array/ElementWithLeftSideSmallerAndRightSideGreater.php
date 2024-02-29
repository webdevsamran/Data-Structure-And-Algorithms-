<?php

function findElement($arr, $n){
    $arr1 = $arr2 = array();
    $max = $arr[0];
    $min = $arr[$n-1];
    for($i = 0; $i < $n; $i++){
        if($arr[$i] > $max){
            $max = $arr[$i];
        }
        $arr1[$i] = $max;
    }
    for($i = $n - 1; $i >= 0; $i--){
        if($arr[$i] < $min){
            $min = $arr[$i];
        }
        $arr2[$i] = $min;
    }
    echo "<pre>";
    print_r($arr1);
    print_r($arr2);
    $max_el = -1;
    for($i = 1; $i < $n; $i++){
        if($arr1[$i] == $arr2[$i]){
            $max_el = $arr1[$i];
        }
    }
    return ($max_el == -1) ? -1 : $max_el;
}

$N = 4;
$A = [4, 2, 5, 7];

echo findElement($A, $N);