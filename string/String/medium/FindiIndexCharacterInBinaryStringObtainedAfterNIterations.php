<?php

function KthCharacter($m, $n, $k){
    $distane = pow($n,2);
    $block_number = (int)($k / $distane);
    $remaing = $k % $distane;
    $s = array();
    for($x = 0; $m > 0; $x++){
        $s[$x] = $m % 2;
        $m /= 2;
    }
    $root = $s[$x - 1 - $block_number];
    if($remaing == 0){
        echo $root . " ";
        return;
    }
    $flip = true;
    while($remaing > 1){
        if($remaing & 1){
            $flip = !$flip;
        }
        $remaing = $remaing >> 1;
    }
    if($flip){
        echo !$root . " ";
    }else{
        echo $root . " ";
    }
}

$m = 5;
$k = 5;
$n = 3;
KthCharacter($m, $n, $k);