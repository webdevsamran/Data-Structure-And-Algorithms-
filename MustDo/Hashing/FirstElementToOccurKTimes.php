<?php

function firstElement($arr, $n, $k){
    $map = array();
    for($i = 0; $i < $n; $i++){
        $map[$arr[$i]]++;
    }
    for($i = 0; $i < $n; $i++){
        if($map[$arr[$i]] == $k){
            return $arr[$i];
        }
    }
    return -1;
}

$arr = [1, 7, 4, 3, 4, 8, 7];
$n = sizeof($arr);
$k = 2;
echo firstElement($arr, $n, $k);