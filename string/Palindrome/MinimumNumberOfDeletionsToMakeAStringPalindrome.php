<?php

function minDeletionsToMakePalindrome(string $str, int $start, int $end): int
{
    if ($start >= $end) {
        return 0;
    }
    if ($str[$start] == $str[$end]) {
        return minDeletionsToMakePalindrome($str, $start + 1, $end - 1);
    }
    return 1 + min(minDeletionsToMakePalindrome($str, $start + 1, $end), minDeletionsToMakePalindrome($str, $start, $end - 1));
}

$str = "aebcbda";
$len = strlen($str) - 1;
echo minDeletionsToMakePalindrome($str, 0, $len);
