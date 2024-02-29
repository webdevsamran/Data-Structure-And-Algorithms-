<?php

function concatenatedString($s1, $s2){
    $set = array();
    for($i = 0; $i < strlen($s2); $i++){
        $set[$s2[$i]]++;
    }
    $res = '';
    for($i = 0; $i < strlen($s1); $i++){
        if(array_key_exists($s1[$i],$set)){
            unset($set[$s1[$i]]);
        }else{
            $res .= $s1[$i];
        }
    }
    foreach($set as $ele => $f){
        $res .= $ele;
    }
    return $res;
}

$s1 = "abcs";
$s2 = "cxzca";
echo concatenatedString($s1, $s2);