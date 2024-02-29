<?php

function rotateByOne(&$arr){
    $temp = array();
    $n = sizeof($arr);
    $temp[0] = $arr[$n-1];
    for($i = 0; $i < $n - 1; $i++){
        array_push($temp,$arr[$i]);
    }
    $arr = $temp;
}

$arr = [1,2,3,4];
print_r($arr);
rotateByOne($arr);
print_r($arr);