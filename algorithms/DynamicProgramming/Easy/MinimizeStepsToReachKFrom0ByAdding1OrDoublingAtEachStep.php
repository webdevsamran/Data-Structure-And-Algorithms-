<?php

function minOperation($k){
    $dp = array_fill(0,$k+1,0);
    for($i = 1; $i <= $k; $i++){
        $dp[$i] = $dp[$i-1]+1;
        if($i % 2 == 0){
            $dp[$i] = min($dp[$i], $dp[(int)($i/2)] + 1);
        }
    }
    return $dp[$k];
}

$K = 12;
echo minOperation($K);