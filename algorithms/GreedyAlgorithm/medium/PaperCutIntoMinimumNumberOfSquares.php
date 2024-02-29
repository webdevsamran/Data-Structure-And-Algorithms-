<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function minimumSquare($a,$b){
    $result = 0;
    $rem = 0;
    if($a < $b){
        swap($a,$b);
    }
    while($b > 0){
        $result += (int)($a/$b);
        $rem = $a % $b;
        $a = $b;
        $b = $rem;
    }
    return $result;
}

$n = 13;
$m = 29;
echo minimumSquare($n, $m);