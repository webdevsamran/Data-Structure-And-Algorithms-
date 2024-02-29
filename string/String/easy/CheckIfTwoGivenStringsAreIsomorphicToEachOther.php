<?php

define('MAX_CHARS',256);

function areIsomorphic($str1, $str2){
    $m = strlen($str1);
    $n = strlen($str2);
    if($m != $n){
        return false;
    }
    $marked = array_fill(0,MAX_CHARS,0);
    $map = array_fill(0,MAX_CHARS,-1);
    for($i = 0; $i < $n; $i++){
        if($map[ord($str1[$i])] == -1){
            if($marked[ord($str2[$i])] == true){
                return false;
            }
            $marked[ord($str2[$i])] = true;
            $map[ord($str1[$i])] = $str2[$i];
        }else if($map[ord($str1[$i])] != $str2[$i]){
            return false;
        }
    }
    return true;
}

echo (areIsomorphic("aab", "xxy") ? "True" : "False");