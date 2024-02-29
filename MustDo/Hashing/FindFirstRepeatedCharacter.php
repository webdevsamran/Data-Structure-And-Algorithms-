<?php

function firstRepeating($str){
    $n = strlen($str);
    $map = array();
    for($i = 0; $i < $n; $i++){
        if(!array_key_exists($str[$i],$map)){
            $map[$str[$i]] = 1;
        }else{
            return $str[$i];
        }
    }
    return -1;
}

$str = "geeksforgeeks";
echo firstRepeating($str);