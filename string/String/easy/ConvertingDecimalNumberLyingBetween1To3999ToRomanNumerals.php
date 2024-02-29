<?php

function printRoman($number){
    $num = [ 1, 4, 5, 9, 10, 40, 50, 90, 100, 400, 500, 900, 1000 ];
    $sym = [ "I", "IV", "V", "IX", "X", "XL", "L", "XC", "C", "CD", "D", "CM", "M" ];
    $i=12;
    while($number > 0){
        $div = (int)($number / $num[$i]);
        $number = $number % $num[$i];
        while($div--){
            echo $sym[$i];
        }
        $i--;
    }
}

$number = 3549;
printRoman($number);