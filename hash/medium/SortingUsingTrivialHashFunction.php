<?php

function sortUsingHash($arr,$size){
    $max = max($arr);
    $min = abs(min($arr));
    $hashP = array();
    $hashN = array();

    for($i = 0; $i < $size; $i++){
        if($arr[$i] >= 0){
            if(!array_key_exists($arr[$i],$hashP)){
                $hashP[$arr[$i]] = 0;
            }
            $hashP[$arr[$i]]++;
        }else{
            if(!array_key_exists(abs($arr[$i]),$hashN)){
                $hashN[abs($arr[$i])] = 0;
            }
            $hashN[abs($arr[$i])]++;
        }
    }

    for($i = $min; $i > 0; $i--){
        if(array_key_exists($i,$hashN)){
            for($j = 0; $j < $hashN[$i]; $j++){
                echo (-1 * $i)." ";
            }
        }
    }

    for($i = 0; $i <= $max; $i++){
        if(array_key_exists($i,$hashP)){
            for($j = 0; $j < $hashP[$i]; $j++){
                echo ($i)." ";
            }
        }
    }
}

$a = [ -1, -2, -3, -4, -5, -6, 8, 7,  5,  4,  3,  2,  1,  0 ];
$n = sizeof($a);
sortUsingHash($a, $n);