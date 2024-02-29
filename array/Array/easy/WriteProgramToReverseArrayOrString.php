<?php

function reverseStr(&$arr){
    $n = sizeof($arr);
    $new_arr = array();
    $k = 0;
    for($i = $n - 1; $i >= 0; $i--){
        $new_arr[$k++] = $arr[$i];
    }
    $arr = $new_arr;
}

$arr = [1,2,3];
reverseStr($arr);
print_r($arr);