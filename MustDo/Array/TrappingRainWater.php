<?php

function trappingWater($arr, $n){
    $l = 0;
    $r = $n - 1;
    $left_max = 0;
    $right_max = 0;
    $res = 0;
    while($l <= $r){
        if($arr[$l] <= $arr[$r]){
            if($left_max <= $arr[$l]){
                $left_max = $arr[$l];
            }else{
                $res += $left_max - $arr[$l];
            }
            $l++;
        }else{
            if($right_max <= $arr[$r]){
                $right_max = $arr[$r];
            }else{
                $res += $right_max - $arr[$r];
            }
            $r--;
        }
    }
    return $res;
}

$N = 6;
$arr = [3,0,0,2,0,4];
echo trappingWater($arr, $N);