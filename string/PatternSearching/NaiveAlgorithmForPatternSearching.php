<?php

function searchPattern($pattern,$text){
    $M = strlen($pattern);
    $N = strlen($text);

    for($i = 0; $i < $N - $M; $i++){
        for($j = 0; $j < $M; $j++){
            if($pattern[$j] != $text[$i+$j]){
                break;
            }
        }
        if($j == $M){
            echo "Pattern has Found!<br/>";
            return;
        }
    }
    return;
}

$txt = "AABAACAADAABAAABAA";
$pat = "AABA";
   
searchPattern($pat, $txt);