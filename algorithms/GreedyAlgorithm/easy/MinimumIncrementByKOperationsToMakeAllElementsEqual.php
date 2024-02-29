<?php

function minOps($arr,$n,$k){
    $max = max($arr);
    $res = 0;
    for($i = 0; $i < $n; $i++){
        if(($max - $arr[$i]) % $k != 0){
            return -1;
        }else{
            $res += ($max - $arr[$i]) / $k;
        }
    }
    return $res;
}

$arr = [ 21, 33, 9, 45, 63 ];
$n = sizeof($arr);
$k = 6;
echo minOps($arr, $n, $k);