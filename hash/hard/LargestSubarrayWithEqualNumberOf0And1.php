<?php

function findSubArray($arr,$n){
    $sum = 0;
    $maxSize = 0;
    $startIndex = -1;
    for($i = 0; $i < $n - 1; $i++){
        $sum = ($arr[$i] == 0) ? -1 : 1;
        for($j = $i + 1; $j < $n; $j++){
            ($arr[$j] == 0) ? ($sum += -1) : ($sum += 1);
            if($sum == 0 && $maxSize < $j - $i + 1){
                $maxSize = $j - $i + 1;
                $startIndex = $i;
            }
        }
    }
    if ($maxSize == -1)
        echo "No such subarray";
    else
        echo $startIndex . " to " . ($startIndex + $maxSize - 1);
 
    return $maxSize;
}

$arr = [ 1, 0, 0, 1, 0, 1, 1 ];
$size = sizeof($arr);
findSubArray($arr, $size);