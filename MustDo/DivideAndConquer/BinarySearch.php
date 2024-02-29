<?php

function binarySearch($arr, $low, $high, $key){
    if($high >= $low){
        $mid = $low + (int)(($high - $low) / 2);
        if($arr[$mid] == $key){
            return $mid;
        }
        if($arr[$mid] > $key){
            return binarySearch($arr, $low, $mid - 1, $key);
        }
        return binarySearch($arr, $mid + 1, $high, $key);
    }
    return -1;
}

$arr = [ 2, 3, 4, 10, 40 ];
$x = 10;
$n = sizeof($arr);
$result = binarySearch($arr, 0, $n - 1, $x);
echo ($result == -1) ? "Element is not present in array": "Element is present at index " . $result;