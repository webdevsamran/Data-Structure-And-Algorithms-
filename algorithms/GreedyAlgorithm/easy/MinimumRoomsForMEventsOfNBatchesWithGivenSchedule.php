<?php

function findMinRooms($slots,$n,$m){
    $count = array_fill(0,$m,0);
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $m; $j++){
            if($slots[$i][$j] == '1'){
                $count[$j]++;
            }
        }
    }
    return max($count);
}

$n = 3;
$m = 7;
$slots = [ 
    "0101011",
    "0011001",
    "0110111"
];
echo findMinRooms($slots, $n, $m);