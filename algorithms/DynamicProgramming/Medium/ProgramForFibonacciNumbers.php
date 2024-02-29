<?php

function fib($n){
    $f = array();
    $f[0] = 0;
    $f[1] = 1;
    for($i = 2; $i <= $n; $i++){
        $f[$i] = $f[$i-1] + $f[$i-2];
    }
    return $f[$n];
}

$n = 9;
echo fib($n);