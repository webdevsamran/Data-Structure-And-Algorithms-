<?php

function maximizecube($l,$b,$h){
    $side = gmp_intval(gmp_gcd($l,gmp_intval(gmp_gcd($b,$h))));
    $num = (int)($l / $side);
    $num = ((int)($num * $b / $side));
    $num = ((int)($num * $h / $side));

    echo $side . " , " . $num;
}

$l = 2;
$b = 4;
$h = 6;
 
maximizecube($l, $b, $h);