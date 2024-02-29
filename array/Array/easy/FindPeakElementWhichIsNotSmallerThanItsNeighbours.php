<?php

function findPeak($arr,$n){
    $start = 0;
    $end = $n - 1;
    while($start < $end){
        $mid = $start + (int)(($end - $start)/2);
        if($arr[$mid] > $arr[$mid + 1]){
            $end = $mid;
        }else{
            $start = $mid + 1;
        }
    }
    return $start;
}

$arr = [1, 3, 20, 4, 1, 0];
$n = sizeof($arr);
echo "Index of a peak point is " . findPeak($arr, $n);