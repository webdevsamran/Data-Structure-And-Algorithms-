<?php

function printTwoElements($arr,$n){
    $temp = array();
    $repeatingNum = NULL;
    $missingNum = NULL;
    for($i = 0; $i < $n; $i++){
        if(array_key_exists($arr[$i]-1,$temp)){
            $repeatingNum = $arr[$i];
            break;
        }else{
            $temp[$arr[$i] - 1] = 1;
        }
    }
    for($i = 0; $i < $n; $i++){
        if(!isset($temp[$i])){
            $missingNum = $i+1;
            break;
        }
    }
    echo "Repeating Num is : " . $repeatingNum . " And Missing Num is : " . $missingNum . "<br/>";
}

$arr = [ 7, 3, 4, 5, 5, 6, 2 ];
$n = sizeof($arr);
printTwoElements($arr, $n);