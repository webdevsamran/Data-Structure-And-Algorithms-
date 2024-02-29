<?php

function findCandidate($arr, $n){
    $maj_ind = 0;
    $count = 1;
    for($i = 0; $i < $n; $i++){
        if($arr[$maj_ind] == $arr[$i]){
            $count++;
        }else{
            $count--;
        }
        if($count == 0){
            $maj_ind = $i;
            $count = 1;
        }
    }
    return $arr[$maj_ind];
}

function isMajority($arr, $n, $cand){
    $count = 0;
    for($i = 0; $i < $n; $i++){
        if($arr[$i] == $cand){
            $count++;
        }
    }
    if($count > (int)($n/2)){
        return 1;
    }else{
        return 0;
    }
}

function printMajority($arr, $n){
    $cand = findCandidate($arr, $n);
    if (isMajority($arr, $n, $cand))
        echo " " . $cand . " ";
    else
        echo "No Majority Element";
}

$a = [ 1, 3, 3, 1, 3 ];
$size = (sizeof($a));
printMajority($a, $size);