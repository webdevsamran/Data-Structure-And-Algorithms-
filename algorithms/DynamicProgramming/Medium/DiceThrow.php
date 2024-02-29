<?php

function findWays($f,$d,$s){
    $mem = array_fill(0,$d+1,array_fill(0,$s+1,0));
    $mem[0][0] = 1;
    for($i = 1; $i <= $d; $i++){
        for($j = $i; $j <= $s; $j++){
            $mem[$i][$j] = $mem[$i][$j-1] + $mem[$i-1][$j-1];
            if($j - $f - 1 >= 0){
                $mem[$i][$j] -= $mem[$i - 1][$j - $f - 1];
            }
        }
    }
    return $mem[$d][$s];
}

echo findWays(4, 2, 1) . "<br/>";
echo findWays(2, 2, 3) . "<br/>";
echo findWays(6, 3, 8) . "<br/>";
echo findWays(4, 2, 5) . "<br/>";
echo findWays(4, 3, 5) . "<br/>";