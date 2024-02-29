<?php

function minTime($arr, $n){
    if($n <= 0){
        return 0;
    }
    $incl = $arr[0];
    $excl = 0;
    for($i = 1; $i < $n; $i++){
        $incl_new = $arr[$i] + min($incl,$excl);
        $excl_new = $incl;
        $incl = $incl_new;
        $excl = $excl_new;
    }
    return min($incl, $excl);
}

$arr1 = [10, 5, 2, 7, 10];
$n1 = sizeof($arr1);
echo minTime($arr1, $n1) . "<br/>";

$arr2 = [10, 5, 7, 10];
$n2 = sizeof($arr2);
echo minTime($arr2, $n2) . "<br/>";

$arr3 = [10, 5, 2, 4, 8, 6, 7, 10];
$n3 = sizeof($arr3);
echo minTime($arr3, $n3) . "<br/>";