<?php

function maxConsecutiveOnes($n){
    $count = 0;
    while($n != 0){
        $n = $n & ( $n << 1);
        $count++;
    }
    return $count;
}

echo maxConsecutiveOnes(14) . "<br/>";
echo maxConsecutiveOnes(222) . "<br/>";