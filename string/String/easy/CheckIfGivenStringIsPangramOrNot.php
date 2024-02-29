<?php

function checkPangram($str){
    $set = array();
    for($i = 0; $i < strlen($str); $i++){
        if($str[$i] == " "){
            continue;
        }
        $key = strtolower($str[$i]);
        if(!array_key_exists($key,$set)){
            $set[$key] = 1;
        }
    }
    ksort($set);
    echo "<pre>";
    print_r($set);
    return sizeof($set) == 26;
}

$str = "The quick brown fox jumps over the lazy dog";
if (checkPangram($str) == true)
    echo "It is a Pangram";
else
    echo "It is Not a Pangram";