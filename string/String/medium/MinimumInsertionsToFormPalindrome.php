<?php

function lcs($str,$rev,$m,$n){
    $prev = $curr = array_fill(0,$m+1,0);
    for($i = 0; $i <= $m; $i++){
        for($j = 0; $j <= $m; $j++){
            if($i == 0 || $j== 0){
                $prev[$j] = 0;
            }else if($str[$i-1] == $rev[$j-1]){
                $curr[$j] = $prev[$j-1] + 1;
            }else{
                $curr[$j] = max($prev[$j], $curr[$j - 1]);
            }
        }
        $prev = $curr;
    }
    return $prev[$n];
}

function findMinInsertionsLCS($str,$n){
    $rev = '';
    $rev = strrev($str);
    return ($n - lcs($str, $rev, $n, $n));
}

$str = "geeks";
echo findMinInsertionsLCS($str, strlen($str));