<?php

function printClosest($arr,$n,$x){
    $res_l = $res_r = NULL;
    $l = 0;
    $r = $n - 1;
    $diff = PHP_INT_MAX;
    while($l < $r){
        if(abs($arr[$l] + $arr[$r] - $x) < $diff){
            $res_l = $l;
            $res_r = $r;
            $diff = abs($arr[$l] + $arr[$r] - $x);
        }
        if($arr[$l] + $arr[$r] > $x){
            $r--;
        }else{
            $l++;
        }
    }
    echo " The closest pair is " . $arr[$res_l] . " and " . $arr[$res_r];
}

$arr = [ 10, 22, 28, 29, 30, 40 ];
$x = 54;
$n = sizeof($arr);
printClosest($arr, $n, $x);