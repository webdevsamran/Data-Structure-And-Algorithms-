<?php

define('INFF',1000000009);

function minWordBreak($s,$dict){
    $n = strlen($s);
    $dp = array_fill(0,$n+1,INFF);
    $dp[0] = 0;

    for($i = 1; $i <= $n; $i++){
        foreach($dict as $word){
            $len = strlen($word);
            $new_word = substr($s,$i - $len, $len);
            if($i >= $len && $new_word == $word){
                $dp[$i] = min($dp[$i], $dp[$i - $len] + 1);
            }
        }
    }

    return $dp[$n] - 1;
}

$dict = ["Cat", "Mat", "Ca", "Ma", "at", "C", "Dog", "og", "Do"];
$s = "CatMatat";
echo minWordBreak($s, $dict);