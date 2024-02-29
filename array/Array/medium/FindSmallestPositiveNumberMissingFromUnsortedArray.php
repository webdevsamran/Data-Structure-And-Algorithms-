<?php

function firstMissingPos($arr,$n){
    $present = array();
    for($i = 0; $i < $n; $i++){
        if($arr[$i] > 0 && $arr[$i] < $n){
            $present[$arr[$i]] = 1;
        }
    }
    for($i = 1; $i < $n; $i++){
        if(!array_key_exists($i,$present)){
            return $i;
        }
    }
    return -1;
}

$arr = [ 0, 10, 2, -10, -20 ];
$size = sizeof($arr);
echo firstMissingPos($arr, $size);