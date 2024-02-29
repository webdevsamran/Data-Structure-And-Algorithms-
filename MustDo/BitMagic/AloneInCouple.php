<?php

function solve($arr, $n){
    $x = 0;
    for($i = 0; $i < $n; $i++){
        $x = $x ^ $arr[$i];
    }
    echo $x;
}

$arr = [ 1, 2, 3, 5, 3, 2, 1, 4, 5, 6, 6 ];
// $arr = [1,2,2,1,4];
$n = sizeof($arr);
solve($arr, $n);