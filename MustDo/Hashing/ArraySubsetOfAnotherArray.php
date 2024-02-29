<?php

function isSubset($arr1,$m,$arr2,$n){
    $frequency = array();
    for($i = 0; $i < $m; $i++){
        $frequency[$arr1[$i]]++;
    }
    for($i = 0; $i < $n; $i++){
        if($frequency[$arr2[$i]] > 0){
            $frequency[$arr2[$i]]--;
        }else{
            return false;
        }
    }
    return true;
}

$arr1 = [ 11, 1, 13, 21, 3, 7 ];
$arr2 = [ 11, 3, 7, 1 ];
$m = sizeof($arr1);
$n = sizeof($arr2);
if (isSubset($arr1, $m, $arr2, $n))
    echo "arr2[] is subset of arr1[]";
else
    echo "arr2[] is not a subset of arr1[]";