<?php

function findMajority($arr,$n){
    $count = array();
    for($i = 0; $i < $n; $i++){
        if(!array_key_exists($arr[$i],$count)){
            $count[$arr[$i]] = 0;
        }
        $count[$arr[$i]]++;
    }
    $isFound = false;
    foreach($count as $ele => $freq){
        if($freq > (int)($n/2)){
            $isFound = true;
            echo "Majority Element is: " . $ele;
            return;
        }
    }
    if(!$isFound){
        echo "No Majority Element is Present";
    }
    return;
}

$arr = [ 2, 2, 2, 2, 5, 5, 2, 3, 3 ];
$n = sizeof($arr);
findMajority($arr, $n);