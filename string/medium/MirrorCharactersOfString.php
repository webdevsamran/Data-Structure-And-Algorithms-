<?php

function compute($str,$n){
    $len = strlen($str);
    $revereAlphaBets = '';

    for($i = ord('z'); $i >= ord('a'); $i--){
        $revereAlphaBets .= chr($i);
    }

    for($i = $n; $i < $len; $i++){
        $str[$i] = $revereAlphaBets[ord($str[$i]) - ord('a')];
    }

    return $str;
}

$str = "pneumonia";
$n = 4;
$answer = compute($str, $n - 1);
echo $answer;