<?php

function getMaxCountChar($count){
    $max = 0;
    $ch = NULL;
    for($i = 0; $i < 26; $i++){
        if(!array_key_exists($i,$count)){
            continue;
        }
        if($count[$i] > $max){
            $max = $count[$i];
            $ch = ord('a') + $i;
        }
    }
    return chr($ch);
}

function rearrangeString($str){
    $n = strlen($str);
    if($n == 0){
        return "";
    }
    $count = array();
    for($i = 0; $i < $n; $i++){
        if(!array_key_exists((ord($str[$i]) - ord('a')),$count)){
            $count[ord($str[$i]) - ord('a')] = 1;
            continue;
        }
        $count[ord($str[$i]) - ord('a')]++;
    }
    $ch_max = getMaxCountChar($count);
    $max_count = $count[ord($ch_max) - ord('a')];
    $res = array();
    $ind = 0;
    if($max_count > (int)(($n + 1)/2)){
        return $res;
    }
    while($max_count){
        $res[$ind] = $ch_max;
        $ind = $ind + 2;
        $max_count--;
    }
    $count[ord($ch_max) - ord('a')] = 0;
    for($i = 0; $i < 26; $i++){
        if(!array_key_exists($i,$count)){
            continue;
        }
        while($count[$i] > 0){
            $ind = ($ind >= $n) ? 1 : $ind;
            $res[$ind] = chr(ord('a') + $i);
            $ind += 2;
            $count[$i]--;
        }
    }
    ksort($res);
    return implode('',$res);
}

$str = "bbbaa";
$res = rearrangeString($str);
if ($res == "")
    printf("Not possible <br/>");
else
    printf("%s <br/>", $res);