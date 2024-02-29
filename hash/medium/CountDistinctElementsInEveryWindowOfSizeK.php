<?php

function countDistinct($arr,$K,$size){
    $map = array();
    $dist_count = 0;

    for($i = 0; $i < $K; $i++){
        if(!array_key_exists($arr[$i],$map)){
            $dist_count++;
            $map[$arr[$i]] = 1;
            continue;
        }
        $map[$arr[$i]]++;
    }

    echo $dist_count." ";

    for($i = $K; $i < $size; $i++){
        if($map[$arr[$i-$K]] == 1){
            $dist_count--;
        }
        $map[$arr[$i-$K]] -= 1;
        if(!array_key_exists($arr[$i],$map) || $map[$arr[$i]] == 0){
            $dist_count++;
        }
        $map[$arr[$i]] += 1;
        echo $dist_count." ";
    }
}

$arr = [1, 2, 1, 3, 4, 2, 3];
$N = sizeof($arr);
$K = 4;

countDistinct($arr, $K, $N);