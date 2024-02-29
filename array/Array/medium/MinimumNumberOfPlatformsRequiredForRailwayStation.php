<?php

function findPlatform($arr,$dep,$n){
    sort($arr);
    sort($dep);
    $plat_need = 1;
    $result = 1;
    $i = 1;
    $j = 0;
    while($i < $n && $j < $n){
        if($arr[$i] <= $dep[$j]){
            $plat_need++;
            $i++;
        }else if($arr[$i] > $dep[$j]){
            $plat_need--;
            $j++;
        }
        if($plat_need > $result){
            $result = $plat_need;
        }
    }
    return $result;
}

$arr = [ 900, 940, 950, 1100, 1500, 1800 ];
$dep = [ 910, 1200, 1120, 1130, 1900, 2000 ];
$n = sizeof($arr);
echo findPlatform($arr, $dep, $n);