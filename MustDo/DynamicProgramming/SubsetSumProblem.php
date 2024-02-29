<?php

function isSubsetSum($set, $n, $sum){
    $subset = array();
    for($i = 0; $i <= $n; $i++){
        $subset[$i][0] = true;
    }
    for($i = 1; $i <= $sum; $i++){
        $subset[0][$i] = false;
    }
    for($i = 1; $i <= $n; $i++){
        for($j = 1; $j <= $sum; $j++){
            if($j < $set[$i - 1]){
                $subset[$i][$j] = $subset[$i - 1][$j];
            }
            if($j >= $set[$i - 1]){
                $subset[$i][$j] = $subset[$i - 1][$j] || $subset[$i - 1][$j - $set[$i - 1]];
            }
        }
    }
    return $subset[$n][$sum];
}

$set = [ 3, 34, 4, 12, 5, 2 ];
$sum = 9;
$n = sizeof($set);
if (isSubsetSum($set, $n, $sum) == true)
    echo "Found a subset with given sum";
else
    echo "No subset with given sum";