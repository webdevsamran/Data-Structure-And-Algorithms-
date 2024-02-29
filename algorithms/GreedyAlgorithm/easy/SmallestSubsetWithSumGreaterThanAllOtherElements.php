<?php

function minElements($arr,$n){
    $sum = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $arr[$i];
    }
    $halfSum = (int)($sum / 2);
    rsort($arr);
    print_r($arr);
    $res = 0;
    $cur_sum = 0;
    for($i = 0; $i < $n; $i++){
        $cur_sum += $arr[$i];
        $res++;
        if($cur_sum > $halfSum){
            return $res;
        }
    }
    return $res;
}

$arr = [ 3, 1, 7, 1 ];
$n = sizeof($arr);
echo minElements($arr, $n);