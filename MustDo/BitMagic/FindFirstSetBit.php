<?php

function PositionRightmostSetbit($n){
    $p = 1;
    while($n > 0){
        if($n & 1){
            return $p;
        }
        $p++;
        $n = $n >> 1;
    }
    return -1;
}

$n = 18;
$pos = PositionRightmostSetbit($n);
if ($pos != -1)
    echo $pos;
else
    echo 0;