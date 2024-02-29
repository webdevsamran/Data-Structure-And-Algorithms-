<?php

function toggleBitsFromLToR($n, $l, $r){
    $num = ((1 << $r) - 1) ^ (((1 << ($l - 1))) - 1);
    return $n ^ $num;
}

$n = 50;
$l = 2;
$r = 5;
echo toggleBitsFromLToR($n, $l, $r);