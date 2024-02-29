<?php

function lcs(&$s1, &$s2, $i, $j, &$dp){
    if($i == 0 || $j == 0){
        return 0;
    }
    if($dp[$i][$j] != -1){
        return $dp[$i][$j];
    }
    if($s1[$i] == $s2[$j]){
        return $dp[$i][$j] = 1 + lcs($s1,$s2,$i-1,$j-1,$dp);
    }else{
        return $dp[$i][$j] = max(lcs($s1,$s2,$i,$j-1,$dp),lcs($s1,$s2,$i-1,$j,$dp));
    }
}

function printMinDelAndInsert($str1, $str2){
    $m = strlen($str1);
    $n = strlen($str2);
    $dp = array_fill(0,$m,array_fill(0,$n,-1));
    $len = lcs($str1,$str2,$m-1,$n-1,$dp);
    echo "Minimum number of deletions = " . ($m - $len) . "<br/>";
    echo "Minimum number of insertions = " . ($n - $len) . "<br/>";
}

$str1 = "heap";
$str2 = "pea";
printMinDelAndInsert($str1, $str2);