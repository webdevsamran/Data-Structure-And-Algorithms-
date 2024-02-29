<?php

function grayCodeUtil(&$res,$n,&$num){
    if($n == 0){
        array_push($res,$num);
        return;
    }
    grayCodeUtil($res,$n-1,$num);
    $num = $num ^ (1 << ($n - 1));
    grayCodeUtil($res,$n-1,$num);
}

function grayCodes($n){
    $res = array();
    $num = 0;
    grayCodeUtil($res,$n,$num);
    return $res;
}

$n = 3;
$code = grayCodes($n);
echo "<pre>";
print_r($code);