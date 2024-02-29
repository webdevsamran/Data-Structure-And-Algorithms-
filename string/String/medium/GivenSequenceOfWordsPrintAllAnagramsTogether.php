<?php

function createDuplicateArray(&$dupArr, $wordArr, $n){
    for($i = 0; $i < $n; $i++){
        array_push($dupArr, [$wordArr[$i],$i]);
    }
}

function printAnagramsTogether($words,$n){
    $dupArr = array();
    createDuplicateArray($dupArr, $words, $n);
    for($i = 0; $i < $n; $i++){
        $word = str_split($dupArr[$i][0]);
        sort($word);
        $dupArr[$i][0] = implode('',$word);
    }
    sort($dupArr);
    for ($i = 0; $i < $n; $i++)
        echo $words[$dupArr[$i][1]] . " ";
}

$wordArr = [ "cat", "dog", "tac", "god", "act" ];
printAnagramsTogether($wordArr, sizeof($wordArr));