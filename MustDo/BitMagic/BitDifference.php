<?php

function countBitsFlip($a, $b){
    $x = $a ^ $b;
    $c = 0;
    while($x != 0){
        if($x & 1 == 1){
            $c++;
        }
        $x = $x >> 1;
    }
    return $c;
}

$A = 10;
$B = 20;
echo countBitsFlip($A, $B);