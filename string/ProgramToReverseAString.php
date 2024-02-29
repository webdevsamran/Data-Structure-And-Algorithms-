<?php

function reverseString(string $str): string
{
    $len = strlen($str);
    $rev_str = "";
    for ($i = $len - 1; $i >= 0; $i--) {
        $rev_str .= $str[$i];
    }
    return $rev_str;
}

$str = "Samran";
echo reverseString($str);
