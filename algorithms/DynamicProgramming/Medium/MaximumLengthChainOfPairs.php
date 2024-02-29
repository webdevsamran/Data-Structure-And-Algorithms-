<?php

function maxChainLength($arr,$n){
    $max = 0;
    $maxChain = array();
    for($i = 0; $i < $n; $i++){
        $maxChain[$i] = 1;
    }
    for($i = 1; $i < $n; $i++){
        for($j = 0; $j < $i; $j++){
            if($arr[$i][0] > $arr[$j][1] && $maxChain[$i] < $maxChain[$j] + 1){
                $maxChain[$i] = $maxChain[$j] + 1;
            }
        }
    }
    for($i = 0; $i < $n; $i++){
        if($max < $maxChain[$i]){
            $max = $maxChain[$i];
        }
    }
    return $max;
}

$arr = [ 
    [5, 24], 
    [15, 25],
    [27, 40], 
    [50, 60] 
];
$n = sizeof($arr);
echo "Length of maximum size chain is " . maxChainLength( $arr, $n );