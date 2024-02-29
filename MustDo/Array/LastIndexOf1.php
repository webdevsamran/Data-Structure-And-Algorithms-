<?php

function lastIndex($s){
    $temp = -1;
    for($i = 0; $i < strlen($s); $i++){
        if($s[$i] == 1){
            $temp = $i;
        }
    }
    return $temp;
}

$S = "00001";
echo lastIndex($S);