<?php

function chooseandswap($s){
    $set = array();
    $n = strlen($s);
    for($i = 0; $i < $n; $i++){
        if(!in_array($s[$i],$set)){
            array_push($set,$s[$i]);
        }
    }
    for($i = 0; $i < $n; $i++){
        unset($set[$s[$i]]);
        if(empty($set)){
            break;
        }

    }
}

$s = "ccad";
echo chooseandswap($s);