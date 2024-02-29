<?php

function checkBitsFlip(string $str): bool
{
    $zeroes = 0;
    $ones = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == '0') {
            $zeroes++;
        } else {
            $ones++;
        }
    }
    if ($zeroes == 1 || $ones == 1){
        return "Yes";
    }else{
        return "No";
    }
}

$str = "100001";
echo checkBitsFlip($str);
