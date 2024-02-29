<?php

function printCountDP($dist){
    $count = array();
    $count[0] = 1;
    if($dist >= 1){
        $count[1] = 1;
    }
    if($dist >= 2){
        $count[2] = 2;
    }
    for($i = 3; $i <= $dist; $i++){
        $count[$i] = $count[$i-1] + $count[$i-2] + $count[$i-3];
    }
    return $count[$dist];
}

$dist = 4;
echo printCountDP($dist);