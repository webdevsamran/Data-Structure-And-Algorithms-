<?php

function missingNumber($arr, $n){
    sort($arr);
    for($i = 0; $i < $n; $i++){
        if($arr[$i] != $i + 1){
            return $i + 1;
        }
    }
    return -1;
}

$N = 5;
$A = [1,2,3,5];

echo missingNumber($A, $N);