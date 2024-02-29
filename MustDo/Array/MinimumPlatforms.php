<?php

function findPlatform($arr,$dep,$n){
    sort($arr);
    sort($dep);
    $plt_needed = 1;
    $min_plat = 1;
    $i = 1;
    $j = 0;
    $mx = 1;
    while($i < $n && $j < $n){
        if($arr[$i] <= $dep[$j]){
            $plt_needed++;
            $i++;
        }else if($arr[$i] > $dep[$j]){
            $plt_needed--;
            $j++;
        }
        $mx = max($plt_needed, $mx);
    }
    if($mx > $min_plat){
        $min_plat = $mx;
    }
    return $min_plat;
}

$n = 6;
$arr = ["0900", "0940", "0950", "1100", "1500", "1800"];
$dep = ["0910", "1200", "1120", "1130", "1900", "2000"];

echo findPlatform($arr,$dep,$n) . "<br/>";

$arr1 = ["0900", "1100", "1235"];
$dep1 = ["1000", "1200", "1240"];

echo findPlatform($arr1,$dep1,3);