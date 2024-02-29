<?php

function countStrings($n){
    $a = new SplFixedArray($n);
    $b = new SplFixedArray($n);

    $a[0] = $b[0] = 1;

    for($i = 1; $i < $n; $i++){
        $a[$i] = $a[$i-1] + $b[$i-1];
        $b[$i] = $a[$i-1];
    }

    return ($a[$n-1] + $b[$n-1]);
}

echo countStrings(3);