<?php

function ReFormatString($s,$k){
    $n = strlen($s);
    $s = str_split($s);
    $temp = '';
    for($i = 0; $i < $n; $i++){
        if($s[$i] != '-'){
            $temp .= strtoupper($s[$i]);
        }
    }
    $len = strlen($temp);
    $temp = str_split($temp);
    $ans = '';
    $val = $k;
    for($i = $len - 1; $i >= 0; $i--){
        if($val == 0){
            $val = $k;
            $ans .= '-';
        }
        $ans .= $temp[$i];
        $val--;
    }
    $ans = strrev($ans);
    return $ans;
}

$s = "5F3Z-2e-9-w";
$K = 4;
echo ReFormatString($s, $K);