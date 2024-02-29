<?php

function maxLen($arr, $n){
    $presum = array();
    $sum = $max_len = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $arr[$i];
        if($sum == 0){
            $max_len = $i + 1;
        }
        if(!array_key_exists($sum,$presum)){
            $presum[$sum] = $i;
        }else{
            $max_len = max($max_len, $i - $presum[$sum]);
        }
    }
    return $max_len;
}

$arr = [ 15, -2, 2, -8, 1, 7, 10, 23 ];
$N = sizeof($arr);
echo "Length of the longest 0 sum subarray is " . maxLen($arr, $N);