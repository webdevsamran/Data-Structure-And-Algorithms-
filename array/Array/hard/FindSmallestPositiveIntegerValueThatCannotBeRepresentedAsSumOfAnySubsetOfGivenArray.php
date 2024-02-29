<?php

function smallestpositive($arr,$n){
    $res = 1;
    sort($arr);
    for($i = 0; $i < $n && $arr[$i] <= $res; $i++){
        $res += $arr[$i];
    }
    return $res;
}

$arr1 = [1, 3, 4, 5];
echo smallestpositive($arr1, sizeof($arr1));