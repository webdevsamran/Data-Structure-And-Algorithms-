<?php

function getRightMostSetBit($n){
    if($n == 0){
        return 0;
    }
    return log($n & -$n, 2) + 1;
}

function posOfRightMostDiffBit($m, $n){
    return getRightMostSetBit($m ^ $n);
}

$m = 52;
$n = 24;
echo "Position of rightmost different bit:" . posOfRightMostDiffBit($m, $n);