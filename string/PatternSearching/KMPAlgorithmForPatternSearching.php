<?php

function computeLPSArray($pattern,&$lps,$size){
    $len = 0;
    $lps[0] = 0;
    $i = 1;

    while($i < $size){
        if($pattern[$i] == $pattern[$len]){
            $len++;
            $lps[$i] = $len;
            $i++;
        }else{
            if($len != 0){
                $len = $lps[$len-1];
            }else{
                $lps[$i] = 0;
                $i++;
            }
        }
    }
}

function KMPSearch($pattern,$text){
    $M = strlen($pattern);
    $N = strlen($text);

    $lps = new SplFixedArray($M);

    computeLPSArray($pattern,$lps,$M);
    // print_r($lps);

    $i = 0;
    $j = 0;

    while(($N - $i) >= ($M - $j)){
        if($pattern[$j] == $text[$i]){
            $i++;
            $j++;
        }
        if($j == $M){
            echo "Pattern Found at Position ".($i-$j).".<br/>";
            $j = $lps[$j-1];
        }else if($i < $N && $pattern[$j] != $text[$i]){
            if($j != 0){
                $j = $lps[$j-1];
            }else{
                $i = $i + 1;
            }
        }
    }
}

$txt = "ABABDABACDABABCABAB";
$pat = "ABABCABAB";
KMPSearch($pat, $txt);