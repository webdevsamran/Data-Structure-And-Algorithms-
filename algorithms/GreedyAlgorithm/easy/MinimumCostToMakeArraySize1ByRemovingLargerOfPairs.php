<?php

function cost($a,$n){
    return ($n - 1) * (min($a));
}

$a = [ 4, 3, 2 ];
$n = sizeof($a);
echo cost($a, $n) . "<br/>";