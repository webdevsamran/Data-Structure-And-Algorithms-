<?php

define('SHORT_SIZE',16);

function rotate($n, $d){
    return array($n << $d | ($n >> (SHORT_SIZE - $d)), $n >> $d | ($n << (SHORT_SIZE - $d)));
}

$n = 29;
$d = 2;
print_r(rotate($n, $d));