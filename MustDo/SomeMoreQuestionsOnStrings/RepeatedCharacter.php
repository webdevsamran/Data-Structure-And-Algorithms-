<?php

function firstRep($s){
    $map = array();
    for($i = 0; $i < strlen($s); $i++){
        $map[$s[$i]]++;
    }
    foreach($map as $ele => $freq){
        if($freq > 1){
            return $ele;
        }
    }
    return -1;
}

$s = "geeksforgeeks";
echo firstRep($s);