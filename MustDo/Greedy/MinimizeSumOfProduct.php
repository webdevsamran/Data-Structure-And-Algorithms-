<?php

function minValue($a,$b,$n){
    sort($a);
    sort($b);
    $result = 0;
    for($i = 0; $i < $n; $i++){
        $result += ($a[$i] * $b[$n - $i - 1]);
    }
    return $result;
}

$A = [ 3, 1, 1 ];
$B = [ 6, 5, 4 ];
$n = sizeof($A);
echo minValue($A, $B, $n);