<?php

function isRotated($str1, $str2){
    $n = strlen($str1);
    $clockWise = $antiClockWise = true;
    for($i = 0; $i < $n; $i++){
        if($str1[$i] != $str2[($i+2)%$n]){
            $clockWise = false;
            break;
        }
    }
    for($i = 0; $i < $n; $i++){
        if($str1[($i+2)%$n] != $str2[$i]){
            $antiClockWise = false;
            break;
        }
    }
    return $clockWise || $antiClockWise;
}

$str1 = "geeks";
$str2 = "eksge";
echo isRotated($str1, $str2) ? "Yes" : "No";