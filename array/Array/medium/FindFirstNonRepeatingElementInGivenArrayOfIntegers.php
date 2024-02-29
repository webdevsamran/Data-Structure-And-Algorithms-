<?php

function printFirstRepeating($arr,$n){
    $min = -1;
    $set = array();
    for($i = $n-1; $i >= 0; $i--){
        if(!in_array($arr[$i],$set)){
            $min = $i;
            array_push($set,$arr[$i]);
        }else{
            array_push($set,$arr[$i]);
        }
    }
    if($min != -1){
        echo "First Non-Repeating Element is: " . $arr[$min];
    }else{
        echo "NO Repeating Element Found.";
    }
}

$arr = [ -1, 2, -1, 3, 0 ];
$n = sizeof($arr);
printFirstRepeating($arr, $n);