<?php

define('MAX_CHAR', 26);

function arekAnagrams($str1, $str2, $k){
    $n = strlen($str1);
    if($n != strlen($str2)){
        return false;
    }
    $count1 = array_fill(0,MAX_CHAR,0);
    $count2 = array_fill(0,MAX_CHAR,0);
    for($i = 0; $i < $n; $i++){
        $count1[ord($str1[$i]) - ord('a')]++;
    }
    for($i = 0; $i < $n; $i++){
        $count2[ord($str2[$i]) - ord('a')]++;
    }
    $count = 0;
    for($i = 0; $i < MAX_CHAR; $i++){
        if($count1[$i] > $count2[$i]){
            $count += abs($count1[$i] - $count2[$i]);
        }
    }
    return ($count <= $k);
}

$str1 = "anagram";
$str2 = "grammar";
$k = 2;
if (arekAnagrams($str1, $str2, $k))
    echo "Yes";
else
    echo "No";