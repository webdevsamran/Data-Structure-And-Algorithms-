<?php

function maxLen($arr,$size){
    $map = array();
    $sum = 0;
    $max_len = 0;

    for($i = 0; $i < $size; $i++){
        $sum += $arr[$i];
        if($sum == 0){
            $max_len = $i + 1;
        }else if(array_key_exists($sum,$map)){
            $max_len = max($max_len,$i-$map[$sum]);
        }else{
            $map[$sum] = $i;
        }
    }

    return $max_len;
}

$arr = [ 15, -2, 2, -8, 1, 7, 10, 23 ];
$N = sizeof($arr);

echo "Length of the longest 0 sum subarray is " . maxLen($arr, $N);