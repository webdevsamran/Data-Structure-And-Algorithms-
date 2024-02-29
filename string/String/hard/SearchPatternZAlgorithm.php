<?php

function getZarr($concat,&$Z){
    $n = strlen($concat);
    $L = $R = 0;
    $K = NULL;
    for($i = 1; $i < $n; $i++){
        if($i > $R){
            $L = $R = $i;
            while($R < $n && $concat[$R-$L] == $concat[$R]){
                $R++;
            }
            $Z[$i] = $R - $L;
            $R--;
        }else{
            $k = $i - $L;
            if($Z[$k] < $R - $i + 1){
                $Z[$i] = $Z[$k];
            }else{
                $L = $i;
                while($R < $n && $concat[$R-$L] == $concat[$R]){
                    $R++;
                }
                $Z[$i] = $R - $L;
                $R--;
            }
        }
    }
}

function searchPat($text,$pattern){
    $concat = $pattern . "$" . $text;
    $l = strlen($concat);
    $Z = array();
    getZarr($concat, $Z);
    for($i = 0; $i < $l; $i++){
        if($Z[$i] == strlen($pattern)){
            echo "Pattern found at index " . $i - strlen($pattern) -1 . "<br/>";
        }
    }
}

$text = "GEEKS FOR GEEKS";
$pattern = "GEEK";
searchPat($text, $pattern);