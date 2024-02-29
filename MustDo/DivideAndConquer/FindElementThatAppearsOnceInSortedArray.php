<?php

function search($arr, $low, $high){
    if($low > $high){
        return;
    }
    if($low == $high){
        echo "The Required Element is: " . $arr[$low];
        return;
    }
    $mid = (int)(($low + $high ) / 2);
    if($mid % 2 == 0){
        if($arr[$mid] == $arr[$mid+1]){
            search($arr,$mid + 2, $high);
        }else{
            search($arr,$low, $mid);
        }
    }else{
        if($arr[$mid] == $arr[$mid-1]){
            search($arr,$mid + 1, $high);
        }else{
            search($arr, $low, $mid - 1);
        }
    }
}

$arr = [ 1, 1, 2, 4, 4, 5, 5, 6, 6 ];
$len = sizeof($arr);
search($arr, 0, $len - 1);