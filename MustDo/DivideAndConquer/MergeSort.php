<?php

function merge(&$arr, $low, $mid, $high){
    $n1 = $mid - $low + 1;
    $n2 = $high - $mid;
    $leftArr = array();
    $rightArr = array();
    for($i = 0; $i < $n1; $i++){
        $leftArr[$i] = $arr[$low + $i];
    }
    for($i = 0; $i < $n2; $i++){
        $rightArr[$i] = $arr[$mid + 1 + $i];
    }
    $i = $j = 0;
    $k = $low;
    while($i < $n1 && $j < $n2){
        if($leftArr[$i] <= $rightArr[$j]){
            $arr[$k++] = $leftArr[$i++];
        }else{
            $arr[$k++] = $rightArr[$j++];
        }
    }
    while($i < $n1){
        $arr[$k++] = $leftArr[$i++];
    }
    while($j < $n2){
        $arr[$k++] = $rightArr[$j++];
    }
    unset($leftArr);
    unset($rightArr);
}

function mergeSort(&$arr, $low, $high){
    if($low >= $high){
        return;
    }
    $mid = $low + (int)(($high - $low) / 2);
    mergeSort($arr, $low, $mid);
    mergeSort($arr, $mid + 1, $high);
    merge($arr, $low, $mid, $high);
}

$arr = [ 12, 11, 13, 5, 6, 7 ];
$n = sizeof($arr);
mergeSort($arr, 0, $n - 1);
print_r($arr);