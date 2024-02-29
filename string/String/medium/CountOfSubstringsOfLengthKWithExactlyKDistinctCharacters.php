<?php

function countSubstrings($str,$k){
    $n = strlen($str);
    $answer = 0;
    $map = array();
    for($i = 0; $i < $k; $i++){
        $map[$str[$i]]++;
    }
    if(sizeof($map) == $k){
        $answer++;
    }
    for($i = $k; $i < $n; $i++){
        $map[$str[$i]]++;
        $map[$str[$i-$k]]--;
        if($map[$str[$i-$k]] == 0){
            unset($map[$str[$i-$k]]);
        }
        if(sizeof($map) == $k){
            $answer++;
        }
    }
    return $answer;
}

$str = "aabcdabbcdc";
$K = 3;
echo countSubstrings($str, $K);