<?php

function nextWord(&$string){
    if($string == ""){
        return "a";
    }
    $i = strlen($string) - 1;
    while($string[$i] == 'z' && $i >= 0){
        $i--;
    }
    if($i == -1){
        $string .= 'a';
    }else{
        $ascii = ord($string[$i])+1;
        $string[$i] = chr($ascii);
    }

    return $string;
}

$str = "samez";
$str1 = "geeks";
$str2 = "zzz";
echo nextWord($str)."<br/>";
echo nextWord($str1)."<br/>";
echo nextWord($str2)."<br/>";