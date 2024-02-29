<?php

function romanToDecimal($str){
    $m = array();
    $m['I'] = 1;
    $m['V'] = 5;
    $m['X'] = 10;
    $m['L'] = 50;
    $m['C'] = 100;
    $m['D'] = 500;
    $m['M'] = 1000;
    $sum = 0;
    for($i = 0; $i < strlen($str); $i++){
        if($m[$str[$i]] < $m[$str[$i+1]]){
            $sum += $m[$str[$i+1]] - $m[$str[$i]];
            $i++;
            continue;
        }
        $sum += $m[$str[$i]];
        echo $sum;
    }
    
    return $sum;
}

$str = "MCMIV";
echo "Integer form of Roman Numeral is " . romanToDecimal($str);