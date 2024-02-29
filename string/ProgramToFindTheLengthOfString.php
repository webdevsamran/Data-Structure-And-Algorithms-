<?php

function stringLength(string $str): int
{
    $len = 0;
    $str = str_split($str);
    foreach ($str as $val) {
        $len++;
    }
    return $len;
}

$str = "Samran";
echo stringLength($str);
