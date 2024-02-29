<?php

function maxSum($arr,$n){
    $arrSum = 0;
    $cur_val = 0;
    for($i = 0; $i < $n; $i++){
        $arrSum += $arr[$i];
        $cur_val += ($i * $arr[$i]);
    }
    $maxVal = $cur_val;
    for($i = 1; $i < $n; $i++){
        $cur_val += ($arrSum - $n * ($arr[$n - $i]));
        if($cur_val > $maxVal){
            $maxVal = $cur_val;
        }
    }
    return $maxVal;
}

$arr = [ 10, 1, 2, 3, 4, 5, 6, 7, 8, 9 ];
$n = sizeof($arr);
echo "<br/>Max sum is " . maxSum($arr, $n);