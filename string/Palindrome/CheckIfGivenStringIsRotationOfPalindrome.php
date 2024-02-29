<?php

function isPalindrom(string $str): bool
{
    $len = strlen($str);
    $rev_str = '';
    for ($i = $len - 1; $i >= 0; $i--) {
        $rev_str .= $str[$i];
    }
    return $rev_str == $str;
}

function rotationPlaindrome(string $str): void
{
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $str1 = substr($str, $i + 1);
        $str2 = substr($str, 0, $i + 1);
        $res_str = $str1 . $str2;
        if (isPalindrom($res_str)) {
            echo "Yes";
            return;
        }
    }
    echo "No";
    return;
}


$str = "abcd";
rotationPlaindrome($str);
