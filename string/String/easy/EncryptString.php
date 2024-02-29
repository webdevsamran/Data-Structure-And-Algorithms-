<?php

function encryptString($s,$n){
    $ans = '';
    for($i = 0; $i < $n; $i++){
        $ch = $s[$i];
        $count = 0;
        $hex = NULL;
        while($i < $n && $s[$i] == $ch){
            $count++;
            $i++;
        }
        $i--;
        $hex = base_convert($count,10,16);
        $ans .= $ch;
        $ans .= $hex;
    }
    $ans = strrev($ans);
    return $ans;
}

$S = "abc";
$N = strlen($S);
echo encryptString($S, $N);