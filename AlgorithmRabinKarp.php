<?php

define('d',10);

function rabinKarp($pattern, $text, $q){
    $m = strlen($pattern);
    $n = strlen($text);
    $p = $t = 0;
    $h = 1;
    for($i = 0; $i < $m - 1; $i++){
        $h = ($h * d) % $q;
    }
    for($i = 0; $i < $m; $i++){
        $p = (d * $p + ord($pattern[$i])) % $q;
        $t = (d * $t + ord($text[$i])) % $q;
    }
    for($i = 0; $i <= $n - $m; $i++){
        if($p == $t){
            for($j = 0; $j < $m; $j++){
                if ($text[$i + $j] != $pattern[$j])
                    break;
            }
            if($j == $m){
                echo "Pattern is found at position: " . $i + 1 . "<br/>";
            }
        }
        if($i < $n - $m){
            $t = (d * ($t - ord($text[$i]) * $h) + ord($text[$i + $m])) % $q;
            if($t < 0){
                $t = ($t + $q);
            }
        }
    }
}

$text = "ABCCDDAECDDFG";
$pattern = "CDD";
$q = 13;
rabinKarp($pattern, $text, $q);