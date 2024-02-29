<?php

function checkX($s){
    $i = 0;
    $j = strlen($s) - 1;
    while($i < $j){
        if($s[$i++] != $s[$j--]){
            return false;
        }
    }
    return true;
}

function longestPalin($s){
    $n = strlen($s);
    for($i = $n; $i >= 1; $i--){
        for($j = 0; $j <= $n - $i; $j++){
            $x = substr($s,$j,$i);
            if(checkX($x)){
                return $x;
            }
        }
    }
}

$s = "aaaabbaa";
echo longestPalin($s);