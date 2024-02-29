<?php

function maxProd($n){
    if($n == 2 || $n == 3){
        return $n - 1;
    }
    $res = 1;
    while($n > 4){
        $n -= 3;
        $res *= 3;
    }
    return ($res * $n);
}

echo "Maximum Product is " . maxProd(10);