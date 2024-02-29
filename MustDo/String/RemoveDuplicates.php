<?php

function removeDups($s){
    $map = array();
    $ans = '';
    for($i = 0; $i < strlen($s); $i++){
        if(!array_key_exists($s[$i],$map)){
            $ans .= $s[$i];
            $map[$s[$i]] = 1;
        }
    }
    return $ans;
}

$s = "zvvo";
echo removeDups($s);