<?php

function findTwoGroup($n){
    $sum = $n * (int)(( $n + 1 ) / 2);
    $group1Sum = (int)($sum / 2);
    $group1 = array();
    $group2 = array();

    for($i = $n; $i > 0; $i--){
        if($group1Sum - $i >= 0){
            array_push($group1,$i);
            $group1Sum -= $i;
        }else{
            array_push($group2,$i);
        }
    }

    echo "<pre>";
    print_r($group1);
    print_r($group2);
}

$n = 5;
findTwoGroup($n);