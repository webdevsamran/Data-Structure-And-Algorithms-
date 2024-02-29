<?php

define('NO_OF_CHARS',256);

function longestUniqueSubsttr($str){
    $n = strlen($str);
    $res = 0;
    $lastIndex = array_fill(0,NO_OF_CHARS,-1);
    $i = 0;
    for($j = 0; $j < $n; $j++){
        $i = max($i, $lastIndex[ord($str[$j])] + 1);
        $res = max($res, $j - $i + 1);
        $lastIndex[ord($str[$j])] = $j;
    }
    return $res;
}

$str = "geeksforgeeks";
echo "The input string is " . $str . "<br/>";
$len = longestUniqueSubsttr($str);
echo "The length of the longest non-repeating character substring is: " . $len;