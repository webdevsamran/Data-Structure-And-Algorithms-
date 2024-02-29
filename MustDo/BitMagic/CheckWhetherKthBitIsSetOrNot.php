<?php

function isKthBitSet($n, $k){
    if(($n >> $k) & 1){
        echo "SET";
    }else{
        echo "Not SET";
    }
}

$n = 4;
$k = 2;
isKthBitSet($n, $k);