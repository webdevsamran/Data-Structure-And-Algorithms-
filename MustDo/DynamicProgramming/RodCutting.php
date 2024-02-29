<?php

function maximizeTheCuts($n,$x,$y,$z){
    $dp = array_fill(0,$n+1,0);
    $v = [$x,$y,$z];
    for($i = 1; $i <= $n; $i++){
        foreach($v as $e){
            if($i - $e >= 0 && ($i - $e == 0 || $dp[$i-$e])){
                $dp[$i] = max($dp[$i], $dp[$i-$e] + 1);
            }
        }
    }
    return $dp[$n];
}

$N = 4;
$x = 2;
$y = 1;
$z = 1;

echo maximizeTheCuts($N,$x,$y,$z);