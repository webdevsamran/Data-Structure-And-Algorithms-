<?php

function findSum($str1,$str2){
    if(strlen($str1) > strlen($str2)){
        $temp = $str1;
        $str1 = $str2;
        $str2 = $temp;
    }
    $str = array();
    $n1 = strlen($str1);
    $n2 = strlen($str2);
    $diff = abs($n1 - $n2);
    $carry = 0;
    for($i = $n1 - 1; $i >= 0; $i--){
        $sum = ($str1[$i] + $str2[$i+$diff]) + $carry;
        array_push($str,($sum % 10));
        $carry = $sum / 10;
    }
    for($i = $n2 - $n1 - 1; $i >= 0; $i--){
        $sum = ($str2[$i]) + $carry;
        array_push($str,($sum % 10));
        $carry = $sum / 10;
    }
    if($carry){
        array_push($str,(int)$carry);
    }
    $str = array_reverse($str);
    $index = 0;
    while($index + 1 < sizeof($str) && $str[$index] == 0){
        $index++;
    }
    return substr(implode('',$str),$index);
}

$str1 = "12";
$str2 = "198111";
echo findSum($str1, $str2);