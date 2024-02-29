<?php

function printSubstrings(string $str): void
{
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $new_str = '';
        for ($j = $i; $j < $len; $j++) {
            $new_str .= $str[$j];
            echo $new_str . "<br/>";
        }
    }
}

$str = "abcd";
printSubstrings($str);
