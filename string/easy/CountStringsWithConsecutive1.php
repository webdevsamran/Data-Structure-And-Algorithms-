<?php

function countStrings($n){
    $A = new SplFixedArray($n);
    $B = new SplFixedArray($n);
    $A[0] = $B[0] = 1;

    for($i = 1; $i < $n; $i++){
        $A[$i] = $A[$i-1] + $B[$i-1];
        $B[$i] = $A[$i-1];
    }

    return (1 << $n) - $A[$n-1] - $B[$n-1];
}

echo countStrings(5);