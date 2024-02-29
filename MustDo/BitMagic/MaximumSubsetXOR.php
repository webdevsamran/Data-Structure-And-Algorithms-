<?php

define('INT_BITS', 32);

function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function maxSubsetXOR(&$set, $n){
    $index = 0;
    for($i = INT_BITS - 1; $i >= 0; $i--){
        $maxInd = $index;
        $maxEle = PHP_INT_MIN;
        for($j = $index; $j < $n; $j++){
            if(($set[$j] & (1 << $i)) != 0 && $set[$j] > $maxEle){
                $maxEle = $set[$j];
                $maxInd = $j;
            }
        }
        if($maxEle == PHP_INT_MIN){
            continue;
        }
        swap($set[$index],$set[$maxInd]);
        $maxInd = $index;
        for($j = 0; $j < $n; $j++){
            if($j != $maxInd && ($set[$j] & (1 << $i)) != 0){
                $set[$j] = $set[$j] ^ $set[$maxInd];
            }
        }
        $index++;
    }
    echo "<pre>";
    print_r($set);
    $res = 0;
    for($i = 0; $i < $n; $i++){
        $res ^= $set[$i];
    }
    return $res;
}

$set = [9, 8, 5];
$n = sizeof($set);
echo "Max subset XOR is ";
echo maxSubsetXOR($set, $n);