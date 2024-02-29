<?php

function countOccurrences($arr,$n,$x){
    $res = 0;
    for($i = 0; $i < $n; $i++){
        if($arr[$i] == $x){
            $res++;
        }
    }
    return $res;
}

$arr = [ 1, 2, 2, 2, 2, 3, 4, 7 ,8 ,8 ];
$n = sizeof($arr);
$x = 2;
echo countOccurrences($arr, $n, $x);