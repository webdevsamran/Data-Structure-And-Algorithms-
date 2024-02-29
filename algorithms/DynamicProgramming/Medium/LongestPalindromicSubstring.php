<?php

function printSubStr($str, $start, $end){
    for ($i = $start; $i < $end; $i++)
        echo $str[$i];
}

function longestPalSubstr($str){
    $n = strlen($str);
    $table = array_fill(0,$n,array_fill(0,$n,0));
    $maxLength = 1;
    for($i = 0; $i < $n; $i++){
        $table[$i][$i] = true;
    }
    $start = 0;
    for($i = 0; $i < $n - 1; $i++){
        if($str[$i] == $str[$i+1]){
            $table[$i][$i+1] = true;
            $start = $i;
            $maxLength = 2;
        }
    }
    for($k = 3; $k <= $n; $k++){
        for($i = 0; $i < $n - $k +1; $i++){
            $j = $i + $k - 1;
            if($table[$i+1][$j-1] && $str[$i] == $str[$j]){
                $table[$i][$j] = true;
                if($k > $maxLength){
                    $start = $i;
                    $maxLength = $k;
                }
            }
        }
    }
    echo "Longest palindrome substring is: ";
    printSubStr($str, $start, $start + $maxLength);
    return $maxLength;
}

$str = "forgeeksskeegfor";
echo "<br/>Length is: " . longestPalSubstr($str);