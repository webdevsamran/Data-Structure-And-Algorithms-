<?php

function printFirstRepeating($arr,$n){
    $min = -1;
    $set = array();
    for($i = $n-1; $i >= 0; $i--){
        if(in_array($arr[$i],$set)){
            $min = $i;
        }else{
            array_push($set,$arr[$i]);
        }
    }
    if($min != -1){
        echo "First Repeating Element is: " . $arr[$min];
    }else{
        echo "NO Repeating Element Found.";
    }
}

$arr = [ 10, 5, 3, 4, 3, 5, 6 ];
$n = sizeof($arr);
printFirstRepeating($arr, $n);