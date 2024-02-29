<?php

function subsetOrNot($arr1,$arr2){
    $m = sizeof($arr1);
    $n = sizeof($arr2);
    $count = array();
    for($i = 0; $i < $m; $i++){
        $count[$arr1[$i]] = 1;
    }
    $p = sizeof($count);
    for($i = 0; $i < $n; $i++){
        $count[$arr2[$i]] = 1;
    }
    if(sizeof($count) != $p){
        echo "Not Subset";
    }else{
        echo "It is Subset";
    }
}

$arr1 = [ 11, 1, 13, 21, 3, 7 ];
$arr2 = [ 11, 3, 7, 1 ];

subsetOrNot($arr1,$arr2);