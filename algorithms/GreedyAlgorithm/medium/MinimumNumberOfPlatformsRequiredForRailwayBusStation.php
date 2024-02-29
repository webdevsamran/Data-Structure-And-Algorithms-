<?php

function findPlatform($arr,$dep,$size){
    sort($arr);
    sort($dep);

    $result = 1;
    $platform_needed = 1;
    $i = 1;
    $j = 0;

    while($i < $size && $j < $size){
        if($arr[$i] <= $dep[$j]){
            $platform_needed++;
            $i++;
        }else if($arr[$i] > $dep[$j]){
            $platform_needed--;
            $j++;
        }
        if($platform_needed > $result){
            $result = $platform_needed;
        }
    }

    return $result;
}

$arr = [ 900, 940, 950, 1100, 1500, 1800 ];
$dep = [ 910, 1200, 1120, 1130, 1900, 2000 ];
$n = sizeof($arr);
echo findPlatform($arr, $dep, $n);