<?php

function checkTriplet($arr, $n){
    $map = array();
    for($i = 0; $i < $n; $i++){
        $num = pow($arr[$i],2);
        $map[$num]++;
    }
    for($i = 0; $i < $n; $i++){
        $sum = pow($arr[$i],2);
        for($j = $i + 1; $j < $n; $j++){
            $sum += pow($arr[$j],2);
            if(array_key_exists($sum,$map)){
                return true;
            }
            $sum -= pow($arr[$j],2);
        }
    }
    return false;
}

$N = 5;
$arr = [3, 2, 4, 6, 5];

echo checkTriplet($arr, $N);