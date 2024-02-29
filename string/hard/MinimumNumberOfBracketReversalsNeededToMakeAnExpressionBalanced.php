<?php

function countMinReversals($expr){
    $len = strlen($expr);

    if($len % 2 != 0){
        return "Not Possible";
    }

    $left_brac = 0;
    $right_brac = 0;
    $ans = 0;

    for($i = 0; $i < $len; $i++){
        if($expr[$i] == '{'){
            $left_brac++;
        }else{
            if($left_brac == 0){
                $right_brac++;
            }else{
                $left_brac--;
            }
        }
    }

    $ans = ceil($left_brac/2) + ceil($right_brac/2);
    return $ans;
}

$expr = "}}{{";
echo countMinReversals($expr);