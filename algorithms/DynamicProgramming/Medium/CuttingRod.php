<?php

function cutRod($arr,$index,$n,&$dp){
    if($index == 0){
        return $n * $arr[$index];
    }
    if($dp[$index][$n] != -1){
        return $dp[$index][$n];
    }
    $notCut = cutRod($arr, $index - 1, $n, $dp);
    $cut = PHP_INT_MIN;
    $rod_length = $index + 1;
    if($rod_length <= $n){
        $cut = $arr[$index] + cutRod($arr, $index, $n - $rod_length, $dp);
    }
    return $dp[$index][$n] = max($notCut,$cut);
}

$arr = [ 1, 5, 8, 9, 10, 17, 17, 20 ];
$size = sizeof($arr);
$dp = array_fill(0,$size,array_fill(0,$size + 1, -1));
echo "Maximum Obtainable Value is " . cutRod($arr, $size - 1, $size, $dp);