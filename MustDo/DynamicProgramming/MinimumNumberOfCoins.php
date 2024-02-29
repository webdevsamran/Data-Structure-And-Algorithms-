<?php

function minPartition($coins, $k){
    $ans =  array();
    $n = sizeof($coins);
    for($i = $n - 1; $i >= 0; $i--){
        while($coins[$i] <= $k){
            array_push($ans,$coins[$i]);
            $k -= $coins[$i];
        }
    }
    return $ans;
}

$coins = [ 1, 2, 5, 10, 20, 50, 100, 200, 500, 2000 ];
$k = 43;
print_r(minPartition($coins,$k));