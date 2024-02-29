<?php

function longLenStrictBitonicSub($arr,$n){
    $inc = array();
    $dec = array();
    $len_inc = array();
    $len_dcr = array();
    $longLen = 0;
    for($i = 0; $i < $n; $i++){
        $len = 0;
        if(array_key_exists($arr[$i]-1,$inc)){
            $len = $inc[$arr[$i]-1];
        }
        $inc[$arr[$i]] = $len_inc[$i] = $len + 1;
    }
    for($i = $n-1; $i >= 0; $i--){
        $len = 0;
        if(array_key_exists($arr[$i]-1,$dec)){
            $len = $dec[$arr[$i]-1];
        }
        $dec[$arr[$i]] = $len_dcr[$i] = $len + 1;
    }
    for ($i = 0; $i < $n; $i++)
        if ($longLen < ($len_inc[$i] + $len_dcr[$i] - 1))
            $longLen = $len_inc[$i] + $len_dcr[$i] - 1;
    return $longLen;
}

$arr = [1, 5, 2, 3, 4, 5, 3, 2];
$n = sizeof($arr);
echo "Longest length strict bitonic subsequence = " . longLenStrictBitonicSub($arr, $n);