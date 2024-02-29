<?php

function find3Numbers($arr,$n,$sum){
    $l = $r = NULL;
    sort($arr);
    for($i = 0; $i < $n - 2; $i++){
        $l = $i + 1;
        $r = $n - 1;
        while($l < $r){
            if($arr[$i] + $arr[$l] + $arr[$r] == $sum){
                printf("Triplet is %d, %d, %d", $arr[$i], $arr[$l], $arr[$r]);
                return true;
            }else if($arr[$i] + $arr[$l] + $arr[$r] < $sum){
                $l++;
            }else{
                $r--;
            }
        }
    }
    return false;
}

$A = [ 1, 4, 45, 6, 10, 8 ];
$sum = 22;
$arr_size = sizeof($A);
find3Numbers($A, $arr_size, $sum);