<?php

function swapBits($x){
    for($i = 0; $i < 32; $i += 2){
        $i_bit = ($x >> $i) & 1;
        $i_1bit = ($x >> ($i + 1)) & 1;
        $x = $x - ($i_bit << $i) - ($i_1bit << ($i + 1)) + ($i_bit << ($i + 1)) + ($i_1bit << $i);
    }
    return $x;
}

$x = 23;
echo swapBits($x);