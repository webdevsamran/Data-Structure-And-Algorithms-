<?php

function countDistinct($arr, $k, $n){
    $map = array();
    $dist_count = 0;
    for($i = 0; $i < $k; $i++){
        if(!array_key_exists($arr[$i],$map)){
            $dist_count++;
            $map[$arr[$i]] = 0;
        }
        $map[$arr[$i]]++;
    }
    echo $dist_count . " ";
    for($i = $k; $i < $n; $i++){
        if($map[$arr[$i-$k]] == 1){
            $dist_count--;
        }
        $map[$arr[$i-$k]] -= 1;
        if(!array_key_exists($arr[$i],$map) || $map[$arr[$i]] == 0){
            $dist_count++;
            $map[$arr[$i]] = 0;
        }
        $map[$arr[$i]]++;
        echo $dist_count . " ";
    }
}

$arr = [ 1, 2, 1, 3, 4, 2, 3];
$N = sizeof($arr);
$K = 4;
countDistinct($arr, $K, $N);