<?php

function search($arr, $low, $high, $key){
    if($low > $high){
        return -1;
    }
    $mid = (int)(($low + $high) / 2);
    if($arr[$mid] == $key){
        return $mid;
    }
    if($arr[$low] <= $arr[$mid]){
        if($key >= $arr[$low] && $key <= $arr[$mid]){
            return search($arr, $low, $mid - 1, $key);
        }
        return search($arr, $mid + 1, $high, $key);
    }
    if($key >= $arr[$mid] && $key <= $arr[$high]){
        return search($arr, $mid + 1, $high, $key);
    }
    return search($arr, $low, $mid - 1, $key);
}

$arr = [ 4, 5, 6, 7, 8, 9, 1, 2, 3 ];
$n = sizeof($arr);
$key = 3;
$i = search($arr, 0, $n - 1, $key);

if ($i != -1)
    echo "Index: " . $i;
else
    echo "Key not found";