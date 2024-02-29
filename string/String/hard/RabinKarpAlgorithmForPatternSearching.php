<?php

define('d',256);

function searchPat($pat,$txt){
    $M = strlen($pat);
    $N = strlen($txt);
    $q = PHP_INT_MAX;
    $i = $j = NULL;
    $p = 0;
    $t = 0;
    $h = 1;
    for($i = 0; $i < $M - 1; $i++){
        $h = ($h * d) % $q;
    }
    for($i = 0; $i < $M; $i++){
        $p = (d * $p + ord($pat[$i])) % $q;
        $t = (d * $t + ord($txt[$i])) % $q;
    }
    for($i = 0; $i < $N - $M; $i++){
        if($p == $t){
            for($j = 0; $j < $M; $j++) {
                if ($txt[$i + $j] != $pat[$j]) {
                    break;
                }
            }
            if ($j == $M)
                echo "Pattern found at index " . $i . "<br/>";
        }
        if($i < $N - $M){
            $t = (d * ($t - ord($txt[$i]) * $h) + ord($txt[$i + $M])) % $q;
            if ($t < 0)
                $t = ($t + $q);
        }
    }
}

$txt = "GEEKS FOR GEEKS";
$pat = "GEEK";
searchPat($pat, $txt);