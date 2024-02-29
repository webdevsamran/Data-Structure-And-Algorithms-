<?php

function printString($n){
    $str = array();
    $i = 0;
    while($n > 0){
        $rem = $n % 26;
        if($rem == 0){
            $str[$i++] = 'Z';
            $n = ((int)($n / 26)) - 1;
        }else{
            $str[$i++] = chr(($rem - 1) + ord('A'));
            $n = (int)($n/ 26);
        }
    }
    $str = strrev(implode('',$str));
    echo $str . " ";
}

printString(26);
printString(51);
printString(52);
printString(80);
printString(676);
printString(702);
printString(705);