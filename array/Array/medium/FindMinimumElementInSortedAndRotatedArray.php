<?php

function findMin($arr,$n){
    $min = $arr[0];
    for($i = 1; $i < $n; $i++){
        if($min > $arr[$i]){
            $min = $arr[$i];
        }
    }
    return $min;
}

$arr = [ 5, 6, 1, 2, 3, 4 ];
$N = sizeof($arr);

echo findMin($arr, $N);