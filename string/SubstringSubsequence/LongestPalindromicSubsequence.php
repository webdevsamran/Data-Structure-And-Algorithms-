<?php

function longestPalindromicSequence(string $str, int $start, int $end): int
{
    if ($start == $end) {
        return 1;
    }
    if ($start + 1 == $end && $str[$start] == $str[$end]) {
        return 2;
    }
    if ($str[$start] == $str[$end]) {
        return longestPalindromicSequence($str, $start + 1, $end - 1) + 2;
    }
    return max(longestPalindromicSequence($str, $start, $end - 1), longestPalindromicSequence($str, $start + 1, $end));
}

$str = "GEEKSFORGEEKS";
$len = strlen($str);
echo longestPalindromicSequence($str, 0, $len - 1);
