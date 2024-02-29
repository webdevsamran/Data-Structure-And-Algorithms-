<?php

function sort012(&$arr, $n){
    $low = 0;
    $mid = 0;
    $high = $n - 1;
    while($mid <= $high){
        if($arr[$mid] == 0){
            $temp = $arr[$mid];
            $arr[$mid] = $arr[$low];
            $arr[$low] = $temp;
            $low++;
            $mid++;
        }else if($arr[$mid] == 1){
            $mid++;
        }else if($arr[$mid] == 2){
            $temp = $arr[$mid];
            $arr[$mid] = $arr[$high];
            $arr[$high] = $temp;
            $high--;
        }
    }
}

$N = 5;
$arr= [0, 2, 1, 2, 0];
sort012($arr, $N);
print_r($arr);