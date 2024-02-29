<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function findMaximumNum($str,$k,&$max){
    if($k == 0){
        return;
    }
    $n = strlen($str);
    $str = str_split($str);
    for($i = 0; $i < $n - 1; $i++){
        for($j = $i + 1; $j < $n; $j++){
            if($str[$i] < $str[$j]){
                swap($str[$i],$str[$j]);
                if(implode('',$str) > $max){
                    $max = implode('',$str);
                }
                findMaximumNum(implode('',$str),$k-1,$max);
                swap($str[$i],$str[$j]);
            }
        }
    }
}

$str = "129814999";
$k = 4;
$max = $str;
findMaximumNum($str, $k, $max);
echo $max;