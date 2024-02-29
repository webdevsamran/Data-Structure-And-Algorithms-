<?php

function ispalindrome($str){
    $i = 0;
    $j = strlen($str) - 1;
    while($i <= $j){
        if(strtolower($str[$i]) != strtolower($str[$j])){
            return false;
        }
        $i++;
        $j--;
    }
    return true;
}

function saveIronman($s){
    $ans = '';
    for($i = 0; $i < strlen($s); $i++){
        if(ctype_alnum($s[$i])){
            $ans .= $s[$i];
        }
    }
    if(ispalindrome($ans)){
        return true;
    }
    return false;
}

$s = "I am :IronnorI Ma, i";
echo saveIronman($s);