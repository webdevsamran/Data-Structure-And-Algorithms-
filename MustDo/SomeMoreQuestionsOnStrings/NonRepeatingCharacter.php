<?php

function printNonrepeated($str){
    $freq = array();
    for($i = 0; $i < strlen($str); $i++){
        $freq[$str[$i]]++;
    }
    foreach($freq as $key => $freq){
        if($freq == 1){
            return $key;
        }
    }
    return -1;
}

$str = "geeksforgeeks";
echo printNonrepeated($str);