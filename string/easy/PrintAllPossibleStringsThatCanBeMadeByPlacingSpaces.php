<?php

function printPatternUtil($string,$buffer,$i,$j,$len){
    if($i == $len){
        echo implode('',$buffer);
        echo "<br/>";
        return;
    }
    $buffer[$j] = $string[$i];
    printPatternUtil($string,$buffer,$i+1,$j+1,$len);

    $buffer[$j] = ' ';
    $buffer[$j+1] = $string[$i];
    printPatternUtil($string,$buffer,$i+1,$j+2,$len);
}

function printPattern($string){
    $len = strlen($string);
    $buf = array();
    $buf[0] = $string[0];
    printPatternUtil($string,$buf,1,1,$len);
}

$str = "ABCD";
printPattern($str);