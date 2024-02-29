<?php

function canPairs($arr, $n, $k){
    if($n & 1){
        return false;
    }
    $freq = array();
    for($i = 0; $i < $n; $i++){
        $freq[(($arr[$i] % $k) + $k) % $k]++;
    }
    for($i = 0; $i < $n; $i++){
        $rem = (($arr[$i] % $k) + $k) % $k;
        if(2 * $rem == $k){
            if(($freq[$rem] % 2) != 0){
                return false;
            }
        }else if($rem == 0){
            if($freq[$rem] & 1){
                return false;
            }
        }else if($freq[$rem] != $freq[$k - $rem]){
            return false;
        }
    }
    return true;
}

$arr = [ 92, 75, 65, 48, 45, 35 ];
$k = 10;
$n = sizeof($arr);
echo canPairs($arr, $n, $k) ? "True" : "False";