<?php

function printPatternUtil($str,$buf,$i,$j,$n){
    if($i == $n){
        echo implode('',$buf)."<br/>";
        return;
    }
    $buf[$j] = $str[$i];
    printPatternUtil($str,$buf,$i+1,$j+1,$n);

    $buf[$j] = ' ';
    $buf[$j+1] = $str[$i];
    printPatternUtil($str,$buf,$i+1,$j+2,$n);
}

function printPattern($str){
    $n = strlen($str);
    $buf = array();
    $str = str_split($str);
    $buf[0] = $str[0];
    printPatternUtil($str,$buf,1,1,$n);
}

$str = "ABCD";
printPattern($str);