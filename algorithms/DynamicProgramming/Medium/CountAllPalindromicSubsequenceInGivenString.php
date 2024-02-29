<?php

function countPS($i, $j){
    global $dp, $str;
    if($i > $j){
        return 0;
    }
    if($dp[$i][$j] != -1){
        return $dp[$i][$j];
    }
    if($i == $j){
        return $dp[$i][$j] = 1;
    }else if($str[$i] == $str[$j]){
        return $dp[$i][$j] = countPS($i + 1, $j) + countPS($i, $j - 1) + 1;
    }else{
        return $dp[$i][$j] = countPS($i + 1, $j) + countPS($i, $j - 1) - countPS($i + 1, $j - 1);
    }
}

$str = "abcb";
$dp = array_fill(0,1000,array_fill(0,1000,-1));
$n = strlen($str);
echo "Total palindromic subsequence are : " . countPS(0, $n - 1);