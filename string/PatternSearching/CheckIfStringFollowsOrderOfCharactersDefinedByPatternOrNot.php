<?php

define('CHAR_SIZE',256);

function checkPattern($string,$pattern){
    $label = array();
    $order = 1;
    for($i = 0; $i < strlen($pattern); $i++){
        $label[$pattern[$i]] = $order++;
    }
    $last_order = -1;
    for($i = 0; $i < strlen($string); $i++){
        if(array_key_exists($string[$i],$label)){
            if($label[$string[$i]] < $last_order){
                return false;
            }
            $last_order = $label[$string[$i]];
        }
    }

    return true;
}

$string = "engineers rock";
$pattern = "er";

if(checkPattern($string, $pattern)){
    echo "True";
}else{
    echo "False";
}