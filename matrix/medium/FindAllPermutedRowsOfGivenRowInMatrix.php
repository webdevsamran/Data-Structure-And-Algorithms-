<?php

function permutatedRows($matrix,$rows,$cols,$rowNum){
    $s = array();
    for($i = 0; $i < $cols; $i++){
        if(!array_key_exists($matrix[$rowNum][$i],$s)){
            $s[$matrix[$rowNum][$i]] = 0;
        }
        $s[$matrix[$rowNum][$i]]++;
    }
    for($i = 0; $i < $rows; $i++){
        if($i == $rowNum){
            continue;
        }
        for($j = 0; $j < $cols; $j++){
            if(!array_key_exists($matrix[$i][$j],$s)){
                break;
            }
        }
        if($j != $cols){
            continue;
        }
        echo $i." ";
    }
}

$m = 4;
$n = 4;
$r = 3;

$mat = [
    [3, 1, 4, 2],
    [1, 6, 9, 3],
    [1, 2, 3, 4],
    [4, 3, 2, 1]
];
permutatedRows($mat, $m, $n, $r);