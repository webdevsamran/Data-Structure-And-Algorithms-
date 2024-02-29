<?php

function myAtoi($str){
    $res = 0;
    for($i = 0; $i < strlen($str); $i++){
        $res = ($res * 10) + $str[$i];
    }
    return $res;
}

$str = "89789";
$val = myAtoi($str);
echo $val;