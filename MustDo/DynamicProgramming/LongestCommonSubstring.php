<?php

function LCSubStr($X,$Y,$m,$n){
    $LCSuff = array();
    $result = 0;
    for($i = 0; $i <= $m; $i++){
        for($j = 0; $j <= $n; $j++){
            if($i == 0 || $j == 0){
                $LCSuff[$i][$j] = 0;
            }else if($X[$i-1] == $Y[$j-1]){
                $LCSuff[$i][$j] = 1 + $LCSuff[$i-1][$j-1];
                $result = max($result, $LCSuff[$i][$j]);
            }else{
                $LCSuff[$i][$j] = 0;
            }
        }
    }
    return $result;
}

$X = "OldSite:GeeksforGeeks.org";
$Y = "NewSite:GeeksQuiz.com";
$m = strlen($X);
$n = strlen($Y);
echo "Length of Longest Common Substring is " . LCSubStr($X, $Y, $m, $n);