<?php

function isRotated($a,$b){
    $n1 = strlen($a);
    $n2 = strlen($b);

    $temp = substr($a,0,$n1-2);
    $tmp = substr($a,$n1-2);
    $res = $tmp . $temp;

    if($res == $b){
        return true;
    }

    $temp = substr($a,2);
    $tmp = substr($a,0,2);
    $res = $temp . $tmp;

    if($res == $b){
        return true;
    }
    return false;
}

$a = "amazon";
$b = "azonam";

echo isRotated($a, $b);