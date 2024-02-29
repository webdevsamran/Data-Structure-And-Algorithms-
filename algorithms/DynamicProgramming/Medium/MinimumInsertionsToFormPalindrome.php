<?php

function reverseStr($str){
    $n = strlen($str);
    for($i = 0; $i < (int)($n/2); $i++){
        $temp = $str[$i];
        $str[$i] = $str[$n - $i - 1];
        $str[$n - $i - 1] = $temp;
    }
    return $str;
}

function lcs($str,$rev,$m,$n){
    $L = array();
    for($i = 0; $i <= $m; $i++){
        for($j = 0; $j <= $n; $j++){
            if($i == 0 || $j == 0){
                $L[$i][$j] = 0;
            }else if($str[$i-1] == $rev[$j-1]){
                $L[$i][$j] = 1 + $L[$i-1][$j-1];
            }else{
                $L[$i][$j] = max($L[$i - 1][$j], $L[$i][$j - 1]);
            }
        }
    }
    return $L[$m][$n];
}

function findMinInsertionsLCS($str, $n){
    $rev = reverseStr($str);
    return ($n - lcs($str, $rev, $n, $n));
}

$str = "geeks";
echo findMinInsertionsLCS($str, strlen($str));