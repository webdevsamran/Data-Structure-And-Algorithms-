<?php

function swapCharacters(string &$str, int $times, int $d): void
{
    $len = strlen($str);
    $d = $d % $len;
    for ($i = 0; $i < $times; $i++) {
        $temp = $str[$i];
        $str[$i] = $str[($i + $d) % $len];
        $str[($i + $d) % $len] = $temp;
    }
    echo $str;
}

$str = "Samran";
swapCharacters($str, 1, 2);
