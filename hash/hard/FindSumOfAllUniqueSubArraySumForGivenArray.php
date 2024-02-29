<?php

function findSubarraySum($arr,$n){
    $res = 0;
    $map = array();
    for($i = 0; $i < $n; $i++){
        $sum = 0;
        for($j = $i; $j < $n; $j++){
            $sum += $arr[$j];
            $map[$sum]++;
        }
    }
    foreach($map as $key => $val){
        if($val == 1){
            $res += $key;
        }
    }
    return $res;
}

$arr = [ 3, 2, 3, 1, 4 ];
$n = sizeof($arr);
echo findSubarraySum($arr, $n);