<?php

function nextBinaryNumber(string $str): string
{
    $binary_str = base_convert($str, 10, 2);
    echo $binary_str . "<br/>";
    for ($i = strlen($binary_str) - 1; $i >= 0; $i--) {
        if ($binary_str[$i] == '0') {
            $binary_str[$i] = '1';
            break;
        } else {
            $binary_str[$i] = '0';
        }
    }
    if ($i < 0) {
        $binary_str = 1 . $binary_str;
    }
    return $binary_str;
}

$str = "14";
echo nextBinaryNumber($str);
