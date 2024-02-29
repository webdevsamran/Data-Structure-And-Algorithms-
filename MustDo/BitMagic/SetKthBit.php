<?php

function setKthBit($n, $k){
    return ((1 << $k) | $n);
}

$n = 10;
$k = 2;
echo "Kth bit set number = " . setKthBit($n, $k);