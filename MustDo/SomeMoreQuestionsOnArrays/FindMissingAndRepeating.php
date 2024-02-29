<?php

function printTwoElements($arr, $n){
    echo "Repeating Element is: ";
    for($i = 0; $i < $n; $i++){
        if($arr[abs($arr[$i]) - 1] > 0){
            $arr[abs($arr[$i]) - 1] = -$arr[abs($arr[$i]) - 1];
        }else{
            echo abs($arr[$i]) . " ";
        }
    }
    echo " and the Missing Element is: ";
    for($i = 0; $i < $n; $i++){
        if($arr[$i] > 0){
            echo $i + 1;
        }
    }
}

$arr = [ 7, 3, 4, 5, 5, 6, 2 ];
$n = sizeof($arr);
printTwoElements($arr, $n);