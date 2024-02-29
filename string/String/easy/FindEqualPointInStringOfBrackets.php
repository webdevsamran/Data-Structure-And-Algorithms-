<?php

function findIndex($str){
    $cnt_close = 0;
    $l = strlen($str);
    for($i = 0; $i < $l; $i++){
        if($str[$i] == ')'){
            $cnt_close++;
        }
    }
    return $cnt_close;
}

$str = "(()))(()()())))";
echo findIndex($str);