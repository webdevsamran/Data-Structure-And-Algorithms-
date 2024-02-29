<?php

function subArrayExists($arr,$n){
    $sumSet = array();
    $sum = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $arr[$i];
        if($sum == 0 || in_array($sum,$sumSet)){
            return true;
        }
        array_push($sumSet,$sum);
    }
    return false;
}

$arr = [ -3, 2, 3, 1, 6 ];
$N = sizeof($arr);
if (subArrayExists($arr, $N))
    echo "Found a subarray with 0 sum";
else
    echo "No Such Sub Array Exists!";