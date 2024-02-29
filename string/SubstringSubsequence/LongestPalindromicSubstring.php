<?php

function isPalindrome($str): bool
{
    $len = strlen($str);
    $rev_str = '';
    for ($i = $len - 1; $i >= 0; $i--) {
        $rev_str .= $str[$i];
    }
    return $rev_str == $str;
}

function sortByLength($a, $b)
{
    return strlen($b) > strlen($a);
}

function printSubstrings(string $str): array
{
    $len = strlen($str);
    $temp = array();
    for ($i = 0; $i < $len; $i++) {
        $new_str = '';
        for ($j = $i; $j < $len; $j++) {
            $new_str .= $str[$j];
            array_push($temp, $new_str);
        }
    }
    usort($temp, "sortByLength");
    return $temp;
}

function longestPalindromicSubstring($str): void
{
    $temp = printSubstrings($str);
    echo "<pre>";
    print_r($temp);
    foreach ($temp as $val) {
        if (isPalindrome($val)) {
            echo "Longest Palindromic Substring is: " . $val . " and its length is " . strlen($val);
            return;
        }
    }
}

$str = "forgeeksskeegfor";
echo longestPalindromicSubstring($str);
