<?php

function shortestDistance($S, $word1, $word2){
    $d1 = -1;
    $d2 = -1;
    $ans = PHP_INT_MAX;
    for($i = 0; $i < sizeof($S); $i++){
        if($S[$i] == $word1){
            $d1 = $i;
        }
        if($S[$i] == $word2){
            $d2 = $i;
        }
        if($d1 != -1 && $d2 != -1){
            $ans = min($ans, abs($d1 - $d2));
        }
    }
    return $ans;
}

$S = [ "the", "quick", "brown", "fox", "quick" ];
$word1 = "the";
$word2 = "fox";
echo shortestDistance($S, $word1, $word2);