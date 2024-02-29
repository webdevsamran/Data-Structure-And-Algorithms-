<?php

function smallestDifferenceTriplet($arr1,$arr2,$arr3,$n){
    sort($arr1);
    sort($arr2);
    sort($arr3);
    $res_min = NULL;
    $res_max = NULL;
    $res_mid = NULL;
    $i = 0;
    $j = 0;
    $k = 0;
    $diff = PHP_INT_MAX;
    while($i < $n && $j < $n && $k < $n){
        $sum = $arr1[$i] + $arr2[$j] - $arr3[$k];
        $max = max($arr1[$i],max($arr2[$j],$arr3[$k]));
        $min = min($arr1[$i],min($arr2[$j],$arr3[$k]));
        if($min == $arr1[$i]){
            $i++;
        }else if($min == $arr2[$j]){
            $j++;
        }else{
            $k++;
        }
        if($diff > abs($max - $min)){
            $diff = abs($max - $min);
            $res_max = $max;
            $res_mid = $sum - abs($max + $min);
            $res_min = $min;
        }
    }
    echo $res_max . ", " . $res_mid . ", " . $res_min;
}

$arr1 = [5, 2, 8];
$arr2 = [10, 7, 12];
$arr3 = [9, 14, 6];
$n = sizeof($arr1);
smallestDifferenceTriplet($arr1, $arr2, $arr3, $n);