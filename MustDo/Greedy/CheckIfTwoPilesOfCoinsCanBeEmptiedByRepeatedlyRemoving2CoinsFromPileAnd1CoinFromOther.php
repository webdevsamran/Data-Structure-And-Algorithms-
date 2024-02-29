<?php

function canBeEmptied($a, $b){
    if(max($a,$b) > 2 * min($a,$b)){
        echo "No";
        return;
    }
    if(($a + $b) % 3 == 0){
        echo "Yes";
    }else{
        echo "No";
    }
}

$A = 1;
$B = 2;
canBeEmptied($A, $B);