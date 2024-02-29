<?php

function isPalindrome(string $str): bool
{
    $len = strlen($str);
    $rev_str = '';
    for ($i = $len - 1; $i >= 0; $i--) {
        $rev_str .= $str[$i];
    }
    return $rev_str == $str;
}

function algoForPalindrome(string $str): void
{
    $len = strlen($str);
    $substr = '';
    for ($i = 0; $i < $len; $i++) {
        $substr .= $str[$i];
        echo "\t";
        if (isPalindrome($substr)) {
            echo $str[$i] . " Yes";
        } else {
            echo $str[$i] . " No";
        }
        echo "<br/>";
    }
}

$str = "aabaacaabaa";
algoForPalindrome($str);
