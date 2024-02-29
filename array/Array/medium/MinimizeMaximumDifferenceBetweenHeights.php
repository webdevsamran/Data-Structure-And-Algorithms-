<?php

function minimizeTowerHeightDifference($arr,$n,$k){
    $minHeight = min($arr);
    $maxHeight = max($arr);
    $avgHeight = (int)(($minHeight + $maxHeight)/2);
    $initDiff = $maxHeight - $minHeight;
    for($i = 0; $i < $n; $i++){
        if($arr[$i] <= $avgHeight){
            $arr[$i] += $k;
        }else{
            $arr[$i] -= $k;
        }
    }
    $newMinHeight = min($arr);
    $newMaxHeight = max($arr);
    $newDiff = $newMaxHeight - $newMinHeight;
    return ($newDiff > $initDiff) ? $initDiff : $newDiff;
}

$arr = [ 7, 4, 8, 8, 8, 9 ];
$n = sizeof($arr);
$k = 6;
$result = minimizeTowerHeightDifference($arr, $n, $k);
echo $result;