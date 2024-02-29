<?php

function minimizeTowerHeightDifference($arr,$n,$k){
    $minHeight = min($arr);
    $maxHeight = max($arr);
    $initDiff = abs($maxHeight - $minHeight);
    $avgHeight = (int)(($maxHeight + $minHeight) / 2);
    for($i = 0; $i < $n; $i++){
        if($arr[$i] <= $avgHeight){
            $arr[$i] -= $avgHeight;
        }else{
            $arr[$i] += $avgHeight;
        }
    }
    $newMinHeight = min($arr);
    $newMaxHeight = max($arr);
    $newDiff = abs($newMaxHeight - $newMinHeight);
    return ($newDiff > $initDiff) ? $initDiff : $newDiff;
}

$arr = [ 7, 4, 8, 8, 8, 9 ];
$n = sizeof($arr);
$k = 6;
$result = minimizeTowerHeightDifference($arr, $n, $k);
echo $result;