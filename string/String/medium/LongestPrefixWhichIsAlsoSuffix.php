<?php

function largest_prefix_suffix($str){
    $n = strlen($str);
    if($n < 2){
        return 0;
    }
    $len = 0;
    $i =  1;
    while($i < $n){
        if($str[$i] == $str[$len]){
            $len++;
            $i++;
        }else{
            $i = $i - $len + 1;
            $len = 0;
        }
    }
    return $len > (int)($n / 2) ? (int)($len / 2) : $len;
}

$s = "blablabla";
echo largest_prefix_suffix($s);