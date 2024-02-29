<?php

function countDistictSubarray($arr,$n){
    $vis = array();
    for($i = 0; $i < $n; $i++){
        $vis[$arr[$i]] = 1;
    }
    $k = sizeof($vis);
    $vis = array();
    $count = 0;
    $right = 0;
    $window = 0;
    for($left = 0; $left < $n; $left++){
        while($right < $n && $window < $k){
            ++$vis[$arr[$right]];
            if($vis[$arr[$right]] == 1){
                ++$window;
            }
            ++$right;
        }
        if($window == $k){
            $count += ($n - $right + 1);
        }
        --$vis[$arr[$left]];
        if($vis[$arr[$left]] == 0){
            --$window;
        }
    }
    return $count;
}

$arr = [2, 1, 3, 2, 3];
$n = sizeof($arr);
echo countDistictSubarray($arr, $n);