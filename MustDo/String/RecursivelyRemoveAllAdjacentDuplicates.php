<?php

function rremove($s){
    $t = '';
    for($i = 0; $i < strlen($s); $i++){
        if($s[$i] != $s[$i+1] && $s[$i] != $s[$i-1]){
            $t .= $s[$i];
        }
    }
    if(strlen($s) == strlen($t)){
        return $t;
    }
    return rremove($t);
}

$s = "geeksforgeek";
echo rremove($s);