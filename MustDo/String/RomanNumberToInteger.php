<?php

function romanToDecimal($s){
    $mp = array();
    $mp["I"] = 1;
    $mp["V"] = 5;
    $mp["X"] = 10;
    $mp["L"] = 50;
    $mp["C"] = 100;
    $mp["D"] = 500;
    $mp["M"] = 1000;
    $sum = 0;
    $n = strlen($s);
    for($i = 0; $i < $n; $i++){
        if($mp[$s[$i]] > $mp[$s[$i+1]]){
            $sum += $mp[$s[$i]];
        }else{
            $sum -= $mp[$s[$i]];
        }
    }
    return $sum;
}

$s = "DM";
echo romanToDecimal($s);