<?php

function atoi($str){
    $n = strlen($str);
    $neg = false;
    $num = 0;
    for($i = 0; $i < $n; $i++){
        if($i == 0 && $str[$i] == '-'){
            $neg = true;
            continue;
        }
        $num = $num * 10 + (int)($str[$i]);
    }
    if($neg){
        return -$num;
    }
    return $num;
}

$str = "-123";
echo atoi($str);